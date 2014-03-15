<?php

/**
 * TblTicket form.
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
class TblTicketForm extends BaseTblTicketForm {

    public function configure() {
        $idFacture = $this->getOption('id_facture');

//        $this->setWidget("id_facture", new sfWidgetFormPropelChoice(array('model' => 'tblFacture', 'add_empty' => "- Aucun -")));
//        $this->setValidator('id_facture', new sfValidatorPropelChoice(array('model' => 'refMarque', 'required' => false)));

        $this->setWidget('id_facture', new sfWidgetFormInputText());
        $this->setValidator('id_facture', new sfValidatorString());

        $insIdTicket = null;
        $insdateentree = null;
        $insdatesortie = null;
        if ($idFacture) {
            $objByFacture = TblTicketQuery::create()->filterByIdFacture($idFacture)->findOne();
            if ($objByFacture) {
                $insIdTicket = TblTicketQuery::create()->filterByIdFacture($idFacture)->findOne();
                $insIdTicket = $insIdTicket->getIdTicket();
                $insdateentree = TblTicketQuery::create()->filterByIdFacture($idFacture)->findOne();
                $insdateentree = $insdateentree->getDateEntreeGarage();
                $insdatesortie = TblTicketQuery::create()->filterByIdFacture($idFacture)->findOne();
                $insdatesortie = $insdatesortie->getDateSortieGarage();
            }
        }

        $this->setWidget('id_ticket', new sfWidgetFormInputText(array(), array("class" => 'inputTransparent')));
        $this->setValidator('id_ticket', new sfValidatorString());
        $this->getWidget('id_ticket')->setDefault($insIdTicket);
        $this->getWidget('id_ticket')->setAttribute('disabled', 'disabled');

        $this->setWidget('date_entree_garage', new sfWidgetFormInputText(array(), array("class" => '')));
        $this->setValidator('date_entree_garage', new sfValidatorString());
        $this->setValidator('date_entree_garage', new sfValidatorDate(array('required' => false)));
        $this->getWidget('date_entree_garage')->setDefault($insdateentree);
        $this->getWidget('date_entree_garage')->setAttribute('disabled', 'disabled');

        $widgetDateTime = new orcaWidgetFormDateText(array('format' => 'Y-m-d H:i:s', 'form' => $this));
        $validatorDateTime = new orcaValidatorDateTimesText(array('with_time' => true, 'format' => 'd/m/Y H:i'));

        $this->setWidget('date_sortie_garage', $widgetDateTime);
        $this->getWidget('date_sortie_garage')->setOption('format', 'Y-m-d H:i:s');
        $this->setValidator('date_sortie_garage', $validatorDateTime);
        $this->setDefault('date_sortie_garage', date('Y-m-d H:i:s'));

        $this->getWidgetSchema()->setLabels(array(
            'id_facture' => 'N° Facture :',
            'date_entree_garage' => 'date entree Garage :',
            'date_sortie_garage' => 'date Sortie Garage :',
            'id_ticket' => 'N° Ticket :'
        ));
    }

}
