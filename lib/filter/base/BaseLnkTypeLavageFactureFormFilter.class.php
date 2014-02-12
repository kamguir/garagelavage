<?php

/**
 * LnkTypeLavageFacture filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLnkTypeLavageFactureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('lnk_type_lavage_facture_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LnkTypeLavageFacture';
  }

  public function getFields()
  {
    return array(
      'id_type_lavage' => 'ForeignKey',
      'id_facture'     => 'ForeignKey',
    );
  }
}
