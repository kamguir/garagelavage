<?php

/**
 * RefSituation filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefSituationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'situation'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'situation'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_situation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefSituation';
  }

  public function getFields()
  {
    return array(
      'id_situation' => 'Number',
      'situation'    => 'Text',
    );
  }
}
