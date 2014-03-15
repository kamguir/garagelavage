<?php

/**
 * TblParamPortail filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblParamPortailFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'param_lib'   => new sfWidgetFormFilterInput(),
      'param_value' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'param_lib'   => new sfValidatorPass(array('required' => false)),
      'param_value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_param_portail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblParamPortail';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'param_lib'   => 'Text',
      'param_value' => 'Text',
    );
  }
}
