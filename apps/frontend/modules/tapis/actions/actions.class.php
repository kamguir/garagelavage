<?php

/**
 * tapis actions.
 *
 * @package    garagelavage
 * @subpackage tapis
 * @author     Your name here
 */
class tapisActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->tblTapiss = tblTapisQuery::create()->find();

        $pager = new sfPropelPager('TblTapis', sfConfig::get('app_max_linge'));
        $pager->setCriteria(TblTapisQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new tblTapisForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new tblTapisForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $tblTapis = tblTapisQuery::create()->findPk($request->getParameter('num_tapis'));
        $this->forward404Unless($tblTapis, sprintf('Object tblTapis does not exist (%s).', $request->getParameter('num_tapis')));
        $this->form = new tblTapisForm($tblTapis);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $tblTapis = tblTapisQuery::create()->findPk($request->getParameter('num_tapis'));
        $this->forward404Unless($tblTapis, sprintf('Object tblTapis does not exist (%s).', $request->getParameter('num_tapis')));
        $this->form = new tblTapisForm($tblTapis);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $tblTapis = tblTapisQuery::create()->findPk($request->getParameter('num_tapis'));
        $this->forward404Unless($tblTapis, sprintf('Object tblTapis does not exist (%s).', $request->getParameter('num_tapis')));
        $tblTapis->delete();

        $this->redirect('tapis/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $tblTapis = $form->save();

//            $this->redirect('tapis/edit?num_tapis=' . $tblTapis->getNumTapis());
            $this->redirect('tapis/index');
        }
    }

    public function executeNewTapis(sfWebRequest $request) {
//        var_dump($request->getParameterHolder());die;
        $this->form = new TblTapisForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->redirect('tapis/listeTapis');
            }
        }
    }

    public function executeListeTapis(sfWebRequest $request) {
        $sf_user = $this->getUser();
        $this->formFilter = new TblTapisFormFilter(null, array('sf_user' => $sf_user), false);
        $this->formFilter->bind($request->isMethod("post") ? $request->getParameter($this->formFilter->getName()) : $sf_user->getAttribute("dataTableFilterTapis", array()));

        if ($this->formFilter->isValid()) {
            $sf_user->setAttribute("dataTableFilterTapis", $this->formFilter->getValues());
        }
    }

    /**
     * ListeObectif ajax pour datatable de index
     * @param sfWebRequest $request
     * @return type
     */
    public function executeListeTapisAjax(sfWebRequest $request) {

        $sf_user = $this->getUser();
        $data = array();

        $formFilter = new TblTapisFormFilter();

        $tblTapis = TblTapisQuery::create()
//                ->joinTblClient()
//                ->joinRefMotorisation()
//                ->joinTblFacture()
                ->mergeWith($formFilter->buildCriteria($sf_user->getAttribute("dataTableFilterTapis", array())))
                ->orderByDatatable($request->getParameter("iSortCol_0"), $request->getParameter("sSortDir_0", Criteria::ASC))
                ->filterByDatatable($request->getParameter("sSearch"))
                ->paginate(($request->getParameter('iDisplayStart') / $request->getParameter('iDisplayLength')) + 1, $request->getParameter("iDisplayLength"));

        foreach ($tblTapis as $tblTapi) /* @var $tblTapi TblTapis */ {
            $data[] = $tblTapi->toArrayString();
        }
        $nb = $tblTapis->count();

        return $this->renderText(json_encode(array("sEcho" => $request->getParameter("sEcho") + 1,
                    "iTotalDisplayRecords" => $nb,
                    "aaData" => $data)));
    }

}
