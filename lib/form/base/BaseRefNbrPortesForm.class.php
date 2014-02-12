<?php

/**
 * RefNbrPortes form base class.
 *
 * @method RefNbrPortes getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefNbrPortesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_nbr_portes'       => new sfWidgetFormInputHidden(),
      'libellet_nbr_portes' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_nbr_portes'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdNbrPortes()), 'empty_value' => $this->getObject()->getIdNbrPortes(), 'required' => false)),
      'libellet_nbr_portes' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_nbr_portes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefNbrPortes';
  }


}
