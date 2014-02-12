<?php

/**
 * TblDepances filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblDepancesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'date_depances'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_ref_depances'  => new sfWidgetFormPropelChoice(array('model' => 'RefDepances', 'add_empty' => true)),
      'montant_depances' => new sfWidgetFormFilterInput(),
      'etat_payement'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'date_depances'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_ref_depances'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RefDepances', 'column' => 'id_ref_depances')),
      'montant_depances' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'etat_payement'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('tbl_depances_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblDepances';
  }

  public function getFields()
  {
    return array(
      'id_depances'      => 'Number',
      'date_depances'    => 'Date',
      'id_ref_depances'  => 'ForeignKey',
      'montant_depances' => 'Number',
      'etat_payement'    => 'Boolean',
    );
  }
}
