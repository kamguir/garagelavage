<?php

/**
 * LnkTypeLavageFacture form base class.
 *
 * @method LnkTypeLavageFacture getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLnkTypeLavageFactureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_type_lavage' => new sfWidgetFormInputHidden(),
      'id_facture'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_type_lavage' => new sfValidatorPropelChoice(array('model' => 'RefTypeLavage', 'column' => 'id_type_lavage', 'required' => false)),
      'id_facture'     => new sfValidatorPropelChoice(array('model' => 'TblFacture', 'column' => 'id_facture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lnk_type_lavage_facture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LnkTypeLavageFacture';
  }


}
