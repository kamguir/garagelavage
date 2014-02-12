<?php

/**
 * RefDepenses filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefDepensesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'libelle_depenses' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'libelle_depenses' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_depenses_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefDepenses';
  }

  public function getFields()
  {
    return array(
      'id_ref_depenses'  => 'Number',
      'libelle_depenses' => 'Text',
    );
  }
}
