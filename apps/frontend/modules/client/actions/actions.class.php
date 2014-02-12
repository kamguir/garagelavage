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
        $this->tblClients = tblClientQuery::create()->find();

        $pager = new sfPropelPager('TblClient', sfConfig::get('app_max_linge'));
        $pager->setCriteria(TblClientQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new tblClientForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->redirect('client/index');
            }
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new tblClientForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $tblClient = tblClientQuery::create()->findPk($request->getParameter('id_client'));
        $this->forward404Unless($tblClient, sprintf('Object tblClient does not exist (%s).', $request->getParameter('id_client')));
        $this->form = new tblClientForm($tblClient);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $tblClient = tblClientQuery::create()->findPk($request->getParameter('id_client'));
        $this->forward404Unless($tblClient, sprintf('Object tblClient does not exist (%s).', $request->getParameter('id_client')));
        $this->form = new tblClientForm($tblClient);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $tblClient = tblClientQuery::create()->findPk($request->getParameter('id_client'));
        $this->forward404Unless($tblClient, sprintf('Object tblClient does not exist (%s).', $request->getParameter('id_client')));
        $tblClient->delete();

        $this->redirect('client/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $tblClient = $form->save();
            $this->redirect('client/index');
//      $this->redirect('client/edit?id_client='.$tblClient->getIdClient());
        }
    }

}
