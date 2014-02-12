<?php

/**
 * RefTypeLavage filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefTypeLavageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'libelle'                      => new sfWidgetFormFilterInput(),
      'montant_lavage'               => new sfWidgetFormFilterInput(),
      'time_lavage'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'lnk_type_lavage_facture_list' => new sfWidgetFormPropelChoice(array('model' => 'TblFacture', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'libelle'                      => new sfValidatorPass(array('required' => false)),
      'montant_lavage'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'time_lavage'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'lnk_type_lavage_facture_list' => new sfValidatorPropelChoice(array('model' => 'TblFacture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_type_lavage_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addLnkTypeLavageFactureListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(LnkTypeLavageFacturePeer::ID_TYPE_LAVAGE, RefTypeLavagePeer::ID_TYPE_LAVAGE);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(LnkTypeLavageFacturePeer::ID_FACTURE, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(LnkTypeLavageFacturePeer::ID_FACTURE, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'RefTypeLavage';
  }

  public function getFields()
  {
    return array(
      'id_type_lavage'               => 'Number',
      'libelle'                      => 'Text',
      'montant_lavage'               => 'Number',
      'time_lavage'                  => 'Date',
      'lnk_type_lavage_facture_list' => 'ManyKey',
    );
  }
}
