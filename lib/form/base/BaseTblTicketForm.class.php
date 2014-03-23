<?php

/**
 * TblTicket form base class.
 *
 * @method TblTicket getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblTicketForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ticket'          => new sfWidgetFormInputHidden(),
      'id_facture'         => new sfWidgetFormPropelChoice(array('model' => 'TblFacture', 'add_empty' => true)),
      'date_entree_garage' => new sfWidgetFormDateTime(),
      'date_sortie_garage' => new sfWidgetFormDateTime(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'deleted_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_ticket'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdTicket()), 'empty_value' => $this->getObject()->getIdTicket(), 'required' => false)),
      'id_facture'         => new sfValidatorPropelChoice(array('model' => 'TblFacture', 'column' => 'id_facture', 'required' => false)),
      'date_entree_garage' => new sfValidatorDateTime(array('required' => false)),
      'date_sortie_garage' => new sfValidatorDateTime(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'deleted_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_ticket[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblTicket';
  }


}
