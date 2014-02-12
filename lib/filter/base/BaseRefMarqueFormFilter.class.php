<?php

/**
 * RefMarque filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefMarqueFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'marque_libelle' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'marque_libelle' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_marque_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefMarque';
  }

  public function getFields()
  {
    return array(
      'marque_id'      => 'Number',
      'marque_libelle' => 'Text',
    );
  }
}
