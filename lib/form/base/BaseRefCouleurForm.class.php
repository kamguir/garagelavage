<?php

/**
 * RefCouleur form base class.
 *
 * @method RefCouleur getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefCouleurForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_couleur'  => new sfWidgetFormInputHidden(),
      'nom_couleur' => new sfWidgetFormInputText(),
      'code'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_couleur'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdCouleur()), 'empty_value' => $this->getObject()->getIdCouleur(), 'required' => false)),
      'nom_couleur' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_couleur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefCouleur';
  }


}
