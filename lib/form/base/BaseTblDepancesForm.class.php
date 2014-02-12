<?php

/**
 * TblDepances form base class.
 *
 * @method TblDepances getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblDepancesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_depances'      => new sfWidgetFormInputHidden(),
      'date_depances'    => new sfWidgetFormDate(),
      'id_ref_depances'  => new sfWidgetFormPropelChoice(array('model' => 'RefDepances', 'add_empty' => true)),
      'montant_depances' => new sfWidgetFormInputText(),
      'etat_payement'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id_depances'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdDepances()), 'empty_value' => $this->getObject()->getIdDepances(), 'required' => false)),
      'date_depances'    => new sfValidatorDate(array('required' => false)),
      'id_ref_depances'  => new sfValidatorPropelChoice(array('model' => 'RefDepances', 'column' => 'id_ref_depances', 'required' => false)),
      'montant_depances' => new sfValidatorNumber(array('required' => false)),
      'etat_payement'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TblDepances', 'column' => array('id_depances')))
    );

    $this->widgetSchema->setNameFormat('tbl_depances[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblDepances';
  }


}
