<?php

/**
 * objectifs actions.
 *
 * @package    garagelavage
 * @subpackage objectifs
 * @author     Your name here
 */
class objectifsActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->tblObjectifs = tblObjectifQuery::create()->find();

        $pager = new sfPropelPager('TblObjectif', sfConfig::get('app_max_linge'));
        $pager->setCriteria(TblObjectifQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new tblObjectifForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new tblObjectifForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $tblObjectif = tblObjectifQuery::create()->findPk($request->getParameter('id_objectif'));
        $this->forward404Unless($tblObjectif, sprintf('Object tblObjectif does not exist (%s).', $request->getParameter('id_objectif')));
        $this->form = new tblObjectifForm($tblObjectif);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $tblObjectif = tblObjectifQuery::create()->findPk($request->getParameter('id_objectif'));
        $this->forward404Unless($tblObjectif, sprintf('Object tblObjectif does not exist (%s).', $request->getParameter('id_objectif')));
        $this->form = new tblObjectifForm($tblObjectif);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $tblObjectif = tblObjectifQuery::create()->findPk($request->getParameter('id_objectif'));
        $this->forward404Unless($tblObjectif, sprintf('Object tblObjectif does not exist (%s).', $request->getParameter('id_objectif')));
        $tblObjectif->delete();

        $this->redirect('objectifs/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $tblObjectif = $form->save();
            $this->redirect('objectifs/index');
//            $this->redirect('objectifs/edit?id_objectif=' . $tblObjectif->getIdObjectif());
        }
    }

    public function executeNewObjectif(sfWebRequest $request) {
//        var_dump($request->getParameterHolder());die;
//        var_dump($request->getParameter('objectif_date'));die;
        $this->form = new TblObjectifForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->redirect('objectifs/index');
            }
        }
    }

}
