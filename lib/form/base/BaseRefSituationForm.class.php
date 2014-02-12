<?php

/**
 * RefSituation form base class.
 *
 * @method RefSituation getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefSituationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_situation' => new sfWidgetFormInputHidden(),
      'situation'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_situation' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdSituation()), 'empty_value' => $this->getObject()->getIdSituation(), 'required' => false)),
      'situation'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_situation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefSituation';
  }


}
