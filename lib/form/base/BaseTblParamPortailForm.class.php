<?php

/**
 * TblParamPortail form base class.
 *
 * @method TblParamPortail getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblParamPortailForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'param_lib'   => new sfWidgetFormInputText(),
      'param_value' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'param_lib'   => new sfValidatorString(array('max_length' => 127, 'required' => false)),
      'param_value' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_param_portail[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblParamPortail';
  }


}
