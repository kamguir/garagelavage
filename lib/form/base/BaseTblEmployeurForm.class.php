<?php

/**
 * TblEmployeur form base class.
 *
 * @method TblEmployeur getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblEmployeurForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_employeur'            => new sfWidgetFormInputHidden(),
      'nom_employeur'           => new sfWidgetFormInputText(),
      'prenom_employeur'        => new sfWidgetFormInputText(),
      'nom_societe'             => new sfWidgetFormInputText(),
      'num_telephone_employeur' => new sfWidgetFormInputText(),
      'adresse_societe'         => new sfWidgetFormInputText(),
      'ville_societe'           => new sfWidgetFormInputText(),
      'adresse_email'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_employeur'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdEmployeur()), 'empty_value' => $this->getObject()->getIdEmployeur(), 'required' => false)),
      'nom_employeur'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'prenom_employeur'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'nom_societe'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'num_telephone_employeur' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'adresse_societe'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ville_societe'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'adresse_email'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_employeur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblEmployeur';
  }


}
