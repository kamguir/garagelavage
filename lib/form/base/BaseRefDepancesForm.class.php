<?php

/**
 * RefDepances form base class.
 *
 * @method RefDepances getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefDepancesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ref_depances'  => new sfWidgetFormInputHidden(),
      'libelle_depances' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_ref_depances'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdRefDepances()), 'empty_value' => $this->getObject()->getIdRefDepances(), 'required' => false)),
      'libelle_depances' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_depances[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefDepances';
  }


}
