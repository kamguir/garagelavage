<?php

/**
 * TblVoiture form base class.
 *
 * @method TblVoiture getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblVoitureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_voiture'      => new sfWidgetFormInputHidden(),
      'id_client'       => new sfWidgetFormPropelChoice(array('model' => 'TblClient', 'add_empty' => true)),
      'immatriculation' => new sfWidgetFormInputText(),
      'id_marque'       => new sfWidgetFormPropelChoice(array('model' => 'RefMarque', 'add_empty' => true)),
      'id_motorisation' => new sfWidgetFormPropelChoice(array('model' => 'RefMotorisation', 'add_empty' => true)),
      'couleur'         => new sfWidgetFormInputText(),
      'nbr_portes'      => new sfWidgetFormPropelChoice(array('model' => 'RefNbrPortes', 'add_empty' => true)),
      'modele'          => new sfWidgetFormInputText(),
      'annee'           => new sfWidgetFormInputText(),
      'nb_visite'       => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
      'deleted_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_voiture'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdVoiture()), 'empty_value' => $this->getObject()->getIdVoiture(), 'required' => false)),
      'id_client'       => new sfValidatorPropelChoice(array('model' => 'TblClient', 'column' => 'id_client', 'required' => false)),
      'immatriculation' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'id_marque'       => new sfValidatorPropelChoice(array('model' => 'RefMarque', 'column' => 'marque_id', 'required' => false)),
      'id_motorisation' => new sfValidatorPropelChoice(array('model' => 'RefMotorisation', 'column' => 'id_motorisation', 'required' => false)),
      'couleur'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'nbr_portes'      => new sfValidatorPropelChoice(array('model' => 'RefNbrPortes', 'column' => 'id_nbr_portes', 'required' => false)),
      'modele'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'annee'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'nb_visite'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
      'deleted_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_voiture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblVoiture';
  }


}
