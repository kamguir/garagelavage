<?php

/**
 * TblTapie form base class.
 *
 * @method TblTapie getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblTapieForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'num_tapie'            => new sfWidgetFormInputHidden(),
      'taille_tapie'         => new sfWidgetFormInputText(),
      'montant_lavage_tapie' => new sfWidgetFormInputText(),
      'date_lavage'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'num_tapie'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getNumTapie()), 'empty_value' => $this->getObject()->getNumTapie(), 'required' => false)),
      'taille_tapie'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'montant_lavage_tapie' => new sfValidatorNumber(array('required' => false)),
      'date_lavage'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_tapie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblTapie';
  }


}
