<?php

/**
 * TblTapis filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblTapisFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'taille_tapis'         => new sfWidgetFormFilterInput(),
      'prix_mettre_carre'    => new sfWidgetFormFilterInput(),
      'montant_lavage_tapis' => new sfWidgetFormFilterInput(),
      'date_lavage_tapis'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'taille_tapis'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prix_mettre_carre'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'montant_lavage_tapis' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'date_lavage_tapis'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('tbl_tapis_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblTapis';
  }

  public function getFields()
  {
    return array(
      'num_tapis'            => 'Number',
      'taille_tapis'         => 'Number',
      'prix_mettre_carre'    => 'Number',
      'montant_lavage_tapis' => 'Number',
      'date_lavage_tapis'    => 'Date',
      'created_at'           => 'Date',
      'deleted_at'           => 'Date',
    );
  }
}
