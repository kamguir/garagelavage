<?php

/**
 * RefMotorisation filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefMotorisationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'motorisation'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'motorisation'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_motorisation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefMotorisation';
  }

  public function getFields()
  {
    return array(
      'id_motorisation' => 'Number',
      'motorisation'    => 'Text',
    );
  }
}
