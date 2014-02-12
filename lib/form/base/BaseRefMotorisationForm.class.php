<?php

/**
 * RefMotorisation form base class.
 *
 * @method RefMotorisation getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefMotorisationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_motorisation' => new sfWidgetFormInputHidden(),
      'motorisation'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_motorisation' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdMotorisation()), 'empty_value' => $this->getObject()->getIdMotorisation(), 'required' => false)),
      'motorisation'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_motorisation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefMotorisation';
  }


}
