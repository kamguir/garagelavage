<?php

/**
 * depenses actions.
 *
 * @package    garagelavage
 * @subpackage depenses
 * @author     Your name here
 */
class depensesActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->tblDepensess = tblDepensesQuery::create()->find();

        $pager = new sfPropelPager('TblDepenses', sfConfig::get('app_max_linge'));
        $pager->setCriteria(TblDepensesQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new tblDepensesForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new tblDepensesForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $tblDepenses = tblDepensesQuery::create()->findPk($request->getParameter('id_depenses'));
        $this->forward404Unless($tblDepenses, sprintf('Object tblDepenses does not exist (%s).', $request->getParameter('id_depenses')));
        $this->form = new tblDepensesForm($tblDepenses);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $tblDepenses = tblDepensesQuery::create()->findPk($request->getParameter('id_depenses'));
        $this->forward404Unless($tblDepenses, sprintf('Object tblDepenses does not exist (%s).', $request->getParameter('id_depenses')));
        $this->form = new tblDepensesForm($tblDepenses);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $tblDepenses = tblDepensesQuery::create()->findPk($request->getParameter('id_depenses'));
        $this->forward404Unless($tblDepenses, sprintf('Object tblDepenses does not exist (%s).', $request->getParameter('id_depenses')));
        $tblDepenses->delete();

        $this->redirect('depenses/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $tblDepenses = $form->save();

            $this->redirect('depenses/index');
//            $this->redirect('depenses/edit?id_depenses=' . $tblDepenses->getIdDepenses());
        }
    }

    public function executeNewDepenses(sfWebRequest $request) {
//        var_dump($request->getParameterHolder());die;
        $this->form = new TblDepensesForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->redirect('depenses/index');
            }
        }
    }

}
