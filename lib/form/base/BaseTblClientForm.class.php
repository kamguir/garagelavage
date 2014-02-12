<?php

/**
 * TblClient form base class.
 *
 * @method TblClient getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblClientForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_client'       => new sfWidgetFormInputHidden(),
      'cin_client'      => new sfWidgetFormInputText(),
      'nom_client'      => new sfWidgetFormInputText(),
      'prenom_client'   => new sfWidgetFormInputText(),
      'situation'       => new sfWidgetFormPropelChoice(array('model' => 'RefSituation', 'add_empty' => true)),
      'age_client'      => new sfWidgetFormInputText(),
      'num_tel'         => new sfWidgetFormInputText(),
      'adresse_client'  => new sfWidgetFormInputText(),
      'fonction_client' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_client'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdClient()), 'empty_value' => $this->getObject()->getIdClient(), 'required' => false)),
      'cin_client'      => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nom_client'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prenom_client'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'situation'       => new sfValidatorPropelChoice(array('model' => 'RefSituation', 'column' => 'id_situation', 'required' => false)),
      'age_client'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'num_tel'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'adresse_client'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fonction_client' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblClient';
  }


}
