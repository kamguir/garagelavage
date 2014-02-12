<?php

/**
 * TblTapie filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblTapieFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'taille_tapie'         => new sfWidgetFormFilterInput(),
      'montant_lavage_tapie' => new sfWidgetFormFilterInput(),
      'date_lavage'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'taille_tapie'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'montant_lavage_tapie' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'date_lavage'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('tbl_tapie_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblTapie';
  }

  public function getFields()
  {
    return array(
      'num_tapie'            => 'Number',
      'taille_tapie'         => 'Number',
      'montant_lavage_tapie' => 'Number',
      'date_lavage'          => 'Date',
    );
  }
}
