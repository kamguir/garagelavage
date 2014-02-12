<?php

/**
 * RefCouleur filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefCouleurFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom_couleur' => new sfWidgetFormFilterInput(),
      'code'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom_couleur' => new sfValidatorPass(array('required' => false)),
      'code'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_couleur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefCouleur';
  }

  public function getFields()
  {
    return array(
      'id_couleur'  => 'Number',
      'nom_couleur' => 'Text',
      'code'        => 'Text',
    );
  }
}
