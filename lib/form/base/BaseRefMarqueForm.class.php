<?php

/**
 * RefMarque form base class.
 *
 * @method RefMarque getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefMarqueForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'marque_id'      => new sfWidgetFormInputHidden(),
      'marque_libelle' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'marque_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getMarqueId()), 'empty_value' => $this->getObject()->getMarqueId(), 'required' => false)),
      'marque_libelle' => new sfValidatorString(array('max_length' => 127, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_marque[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefMarque';
  }


}
