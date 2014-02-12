<?php

/**
 * TblObjectif filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblObjectifFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'objectif_date'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'objectif_fixe'    => new sfWidgetFormFilterInput(),
      'objectif_realise' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'objectif_date'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'objectif_fixe'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'objectif_realise' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tbl_objectif_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblObjectif';
  }

  public function getFields()
  {
    return array(
      'id_objectif'      => 'Number',
      'objectif_date'    => 'Date',
      'objectif_fixe'    => 'Number',
      'objectif_realise' => 'Number',
    );
  }
}
