<?php

/**
 * voiture actions.
 *
 * @package    garagelavage
 * @subpackage voiture
 * @author     Your name here
 */
class voitureActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $sf_user = $this->getUser();
        $this->formFilter = new TblVoitureFormFilter(null, array('sf_user' => $sf_user), false);
        $this->formFilter->bind($request->isMethod("post") ? $request->getParameter($this->formFilter->getName()) : $sf_user->getAttribute("dataTableFilterVoitures", array()));

        if ($this->formFilter->isValid()) {
            $sf_user->setAttribute("dataTableFilterVoitures", $this->formFilter->getValues());
        }
    }

    /**
     * ListeObectif ajax pour datatable de index
     * @param sfWebRequest $request
     * @return type
     */
    public function executeListeVoituresAjax(sfWebRequest $request) {

        $sf_user = $this->getUser();
        $data = array();

        $formFilter = new TblVoitureFormFilter();

        $tblVoitures = TblVoitureQuery::create()
                ->joinTblClient()
                ->joinRefMotorisation()
//                ->joinTblFacture()
                ->mergeWith($formFilter->buildCriteria($sf_user->getAttribute("dataTableFilterVoitures", array())))
                ->orderByDatatable($request->getParameter("iSortCol_0"), $request->getParameter("sSortDir_0", Criteria::ASC))
                ->filterByDatatable($request->getParameter("sSearch"))
                ->paginate(($request->getParameter('iDisplayStart') / $request->getParameter('iDisplayLength')) + 1, $request->getParameter("iDisplayLength"));

        foreach ($tblVoitures as $tblVoiture) /* @var $tblVoiture TblVoiture */ {
            $data[] = $tblVoiture->toArrayString();
        }
        $nb = $tblVoitures->count();

        return $this->renderText(json_encode(array("sEcho" => $request->getParameter("sEcho") + 1,
//                    "iTotalRecords" => $nbT,
                    "iTotalDisplayRecords" => $nb,
                    "aaData" => $data)));
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new tblVoitureForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new tblVoitureForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $tblVoiture = tblVoitureQuery::create()->findPk($request->getParameter('id_voiture'));
        $this->forward404Unless($tblVoiture, sprintf('Object tblVoiture does not exist (%s).', $request->getParameter('id_voiture')));
        $this->form = new tblVoitureForm($tblVoiture);
    }

    public function executeUpdate(sfWebRequest $request) {

        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $tblVoiture = tblVoitureQuery::create()->findPk($request->getParameter('id_voiture'));
        $this->forward404Unless($tblVoiture, sprintf('Object tblVoiture does not exist (%s).', $request->getParameter('id_voiture')));
        $this->form = new tblVoitureForm($tblVoiture);
        $this->processForm($request, $this->form);
        $this->setTemplate('edit');
        $this->redirect('voiture/index');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $tblVoiture = tblVoitureQuery::create()->findPk($request->getParameter('id_voiture'));
        $this->forward404Unless($tblVoiture, sprintf('Object tblVoiture does not exist (%s).', $request->getParameter('id_voiture')));
        $tblVoiture->delete();
        $this->redirect('voiture/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $tblVoiture = $form->save();

//            $this->redirect('voiture/edit?id_voiture=' . $tblVoiture->getIdVoiture());
            $this->redirect('voiture/index');
        }
    }

    public function executeLog(sfWebRequest $request) {
        $this->myData = tblVoitureQuery::create()
                ->find();

        $pager = new sfPropelPager('TblVoiture', sfConfig::get('app_max_linge'));
        $pager->setCriteria(TblVoitureQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeNewVoiture(sfWebRequest $request) {
//var_dump($request->getParameterHolder());die;
        $this->listImmatriculations = TblVoitureQuery::create()
                ->select(array(TblVoiturePeer::IMMATRICULATION))
                ->orderByImmatriculation()
                ->groupByImmatriculation()
                ->find()
                ->toArray();
        $idClient = $request->getParameter('id_client');
        $this->form = new tblVoitureForm(null, array('url' => $this->getController()->genUrl('voiture/ajax'), 'id_client' => $idClient));
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
//                var_dump($this->form->getObject());die;
                $idvoiture = $this->form->getObject()->getIdVoiture();
                $this->redirect('facture/new?idVoiture=' . $idvoiture);
//                $this->redirect('voiture/index');
            }
        }
    }

    public function executeAjax($request) {
        $this->getResponse()->setContentType('application/json');

        $authors = TblVoiturePeer::retrieveForSelect($request->getParameter('q'), $request->getParameter('limit'));

        return $this->renderText(json_encode($authors));
    }

//    public function executeReloadTypeDoc(sfWebRequest $request) {
////        var_dump($request->getParameterHolder());die;
//        $montantLavage = RefTypeLavageQuery::create()
//                ->findPk($request->getParameter('idTypeLavage'));
//        return $this->renderText($montantLavage->getMontantLavage());
//    }

    public function executeCheckTypeLavage(sfWebRequest $request) {
        $typeLavage = RefTypeLavageQuery::create()
                ->findPk($request->getParameter('idTypeLavage'));
        if ($typeLavage) {
            return $this->renderText($typeLavage->getMontantLavage());
        }
    }

    public function executeModifierPrix(sfWebRequest $request) {
        $this->form = new tblVoitureForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->getUser()->setFlash('notice', "Votre demande est validé.");
                $this->form->save();
                $this->redirect('voiture/log');
            }
        }
    }

}
