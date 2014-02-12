<?php

/**
 * TblObjectif form base class.
 *
 * @method TblObjectif getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblObjectifForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_objectif'      => new sfWidgetFormInputHidden(),
      'objectif_date'    => new sfWidgetFormDate(),
      'objectif_fixe'    => new sfWidgetFormInputText(),
      'objectif_realise' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_objectif'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdObjectif()), 'empty_value' => $this->getObject()->getIdObjectif(), 'required' => false)),
      'objectif_date'    => new sfValidatorDate(array('required' => false)),
      'objectif_fixe'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'objectif_realise' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_objectif[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblObjectif';
  }


}
