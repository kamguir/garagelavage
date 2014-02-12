<?php

/**
 * TblDepenses form base class.
 *
 * @method TblDepenses getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblDepensesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_depenses'      => new sfWidgetFormInputHidden(),
      'date_depenses'    => new sfWidgetFormDate(),
      'id_ref_depenses'  => new sfWidgetFormPropelChoice(array('model' => 'RefDepenses', 'add_empty' => true)),
      'montant_depenses' => new sfWidgetFormInputText(),
      'etat_payement'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id_depenses'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdDepenses()), 'empty_value' => $this->getObject()->getIdDepenses(), 'required' => false)),
      'date_depenses'    => new sfValidatorDate(array('required' => false)),
      'id_ref_depenses'  => new sfValidatorPropelChoice(array('model' => 'RefDepenses', 'column' => 'id_ref_depenses', 'required' => false)),
      'montant_depenses' => new sfValidatorNumber(array('required' => false)),
      'etat_payement'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TblDepenses', 'column' => array('id_depenses')))
    );

    $this->widgetSchema->setNameFormat('tbl_depenses[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblDepenses';
  }


}
