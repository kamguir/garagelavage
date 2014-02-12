<?php

/**
 * RefDepances filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefDepancesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'libelle_depances' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'libelle_depances' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_depances_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefDepances';
  }

  public function getFields()
  {
    return array(
      'id_ref_depances'  => 'Number',
      'libelle_depances' => 'Text',
    );
  }
}
