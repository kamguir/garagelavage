<?php

/**
 * TblTapis form base class.
 *
 * @method TblTapis getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblTapisForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'num_tapis'            => new sfWidgetFormInputHidden(),
      'taille_tapis'         => new sfWidgetFormInputText(),
      'prix_mettre_carre'    => new sfWidgetFormInputText(),
      'montant_lavage_tapis' => new sfWidgetFormInputText(),
      'date_lavage_tapis'    => new sfWidgetFormDateTime(),
      'created_at'           => new sfWidgetFormDateTime(),
      'deleted_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'num_tapis'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getNumTapis()), 'empty_value' => $this->getObject()->getNumTapis(), 'required' => false)),
      'taille_tapis'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'prix_mettre_carre'    => new sfValidatorNumber(array('required' => false)),
      'montant_lavage_tapis' => new sfValidatorNumber(array('required' => false)),
      'date_lavage_tapis'    => new sfValidatorDateTime(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'deleted_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_tapis[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblTapis';
  }


}
