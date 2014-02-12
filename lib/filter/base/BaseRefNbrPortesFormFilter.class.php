<?php

/**
 * RefNbrPortes filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefNbrPortesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'libellet_nbr_portes' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'libellet_nbr_portes' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_nbr_portes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefNbrPortes';
  }

  public function getFields()
  {
    return array(
      'id_nbr_portes'       => 'Number',
      'libellet_nbr_portes' => 'Text',
    );
  }
}
