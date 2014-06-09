<?php

/**
 * client actions.
 *
 * @package    garagelavage
 * @subpackage client
 * @author     Your name here
 */
class clientActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->tblClients = TblClientQuery::create()->find();

        $pager = new sfPropelPager('TblClient', sfConfig::get('app_max_linge'));
        $pager->setCriteria(TblClientQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }
    public function executeListeClients(sfWebRequest $request) {
        $sf_user = $this->getUser();
        $this->formFilter = new TblClientFormFilter(null, array('sf_user' => $sf_user), false);
        $this->formFilter->bind($request->isMethod("post") ? $request->getParameter($this->formFilter->getName()) : $sf_user->getAttribute("dataTableFilterClients", array()));

        if ($this->formFilter->isValid()) {
            $sf_user->setAttribute("dataTableFilterClients", $this->formFilter->getValues());
        }
    }

    /**
     * ListeObectif ajax pour datatable de index
     * @param sfWebRequest $request
     * @return type
     */
    public function executeListeClientsAjax(sfWebRequest $request) {

        $sf_user = $this->getUser();
        $data = array();

        $formFilter = new TblClientFormFilter();

        $tblClients = TblClientQuery::create()
//                ->joinTblClient()
//                ->joinRefMotorisation()
//                ->joinTblFacture()
                ->mergeWith($formFilter->buildCriteria($sf_user->getAttribute("dataTableFilterClients", array())))
                ->orderByDatatable($request->getParameter("iSortCol_0"), $request->getParameter("sSortDir_0", Criteria::ASC))
                ->filterByDatatable($request->getParameter("sSearch"))
                ->paginate(($request->getParameter('iDisplayStart') / $request->getParameter('iDisplayLength')) + 1, $request->getParameter("iDisplayLength"));

        foreach ($tblClients as $tblClient) /* @var $tblClient TblClient */ {
            $data[] = $tblClient->toArrayString();
        }
        $nb = $tblClients->count();

        return $this->renderText(json_encode(array("sEcho" => $request->getParameter("sEcho") + 1,
                    "iTotalDisplayRecords" => $nb,
                    "aaData" => $data)));
    }

    public function executeNew(sfWebRequest $request) {
        $idClient = $request->getParameter('idClient');
        $this->form = new TblClientForm(null, array('id_client' => $idClient));
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
//                $this->redirect('client/listeClients');
                $idClient = $this->form->getObject()->getIdClient();
//                $this->redirect('facture/new?idVoiture=' . $idvoiture);
                $this->redirect('voiture/newVoiture?id_client='. $idClient);
            }
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new TblClientForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $tblClient = TblClientQuery::create()->findPk($request->getParameter('id_client'));
        $this->forward404Unless($tblClient, sprintf('Object tblClient does not exist (%s).', $request->getParameter('id_client')));
        $this->form = new TblClientForm($tblClient);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $tblClient = TblClientQuery::create()->findPk($request->getParameter('id_client'));
        $this->forward404Unless($tblClient, sprintf('Object tblClient does not exist (%s).', $request->getParameter('id_client')));
        $this->form = new TblClientForm($tblClient);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();
        $tblClient = tblClientQuery::create()->findPk($request->getParameter('id_client'));
        $this->forward404Unless($tblClient, sprintf('Object tblClient does not exist (%s).', $request->getParameter('id_client')));

        $tblClient->delete();
        $this->redirect('client/listeClients');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $tblClient = $form->save();
            $this->redirect('client/listeClients');
//      $this->redirect('client/edit?id_client='.$tblClient->getIdClient());
        }
    }

}
