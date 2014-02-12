<?php

/**
 * ticket actions.
 *
 * @package    garagelavage
 * @subpackage ticket
 * @author     Your name here
 */
class ticketActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->tblTickets = tblTicketQuery::create()->find();

        $pager = new sfPropelPager('TblTicket', sfConfig::get('app_max_linge'));
        $pager->setCriteria(TblTicketQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new tblTicketForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new tblTicketForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
//        var_dump($request->getParameterHolder());die;
        $tblTicket = tblTicketQuery::create()->findPk($request->getParameter('id_ticket'));
        $this->forward404Unless($tblTicket, sprintf('Object tblTicket does not exist (%s).', $request->getParameter('id_ticket')));
        $this->form = new tblTicketForm($tblTicket);
        $this->idTicket = $request->getParameter('id_ticket');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $tblTicket = tblTicketQuery::create()->findPk($request->getParameter('id_ticket'));
        $this->forward404Unless($tblTicket, sprintf('Object tblTicket does not exist (%s).', $request->getParameter('id_ticket')));
        $this->form = new tblTicketForm($tblTicket);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $tblTicket = tblTicketQuery::create()->findPk($request->getParameter('id_ticket'));
        $this->forward404Unless($tblTicket, sprintf('Object tblTicket does not exist (%s).', $request->getParameter('id_ticket')));
        $tblTicket->delete();

        $this->redirect('ticket/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $tblTicket = $form->save();

            $this->redirect('ticket/edit?id_ticket=' . $tblTicket->getIdTicket());
        }
    }

    public function executeImprimerTicket(sfWebRequest $request) {
//        var_dump($request->getParameterHolder());die;
        $this->infosEmployeur = TblEmployeurQuery::create()->filterByIdEmployeur('1')->findOne();
        $this->tblTickets = tblTicketQuery::create()->find();

        $pager = new sfPropelPager('TblTicket', 5);
        $pager->setCriteria(TblTicketQuery::create());
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->init();
        $this->pager = $pager;

        $this->form = new TblTicketForm();
        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->redirect('ticket/index');
            }
        }
    }

    public function executeReloadTypeDoc(sfWebRequest $request) {

        $this->id_facture = $request->getParameter('id_facture');

        $this->form = new TblTicketForm(NULL, array('id_facture' => $this->id_facture));

        return $this->renderPartial('ticket/typeDoc', array('form' => $this->form));
    }

}
