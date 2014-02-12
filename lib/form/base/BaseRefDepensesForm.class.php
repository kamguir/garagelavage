<?php

/**
 * RefDepenses form base class.
 *
 * @method RefDepenses getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefDepensesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ref_depenses'  => new sfWidgetFormInputHidden(),
      'libelle_depenses' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_ref_depenses'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdRefDepenses()), 'empty_value' => $this->getObject()->getIdRefDepenses(), 'required' => false)),
      'libelle_depenses' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_depenses[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefDepenses';
  }


}
