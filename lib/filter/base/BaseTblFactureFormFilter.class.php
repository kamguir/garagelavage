<?php

/**
 * TblFacture filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblFactureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_voiture'                   => new sfWidgetFormPropelChoice(array('model' => 'TblVoiture', 'add_empty' => true)),
      'id_type_lavage'               => new sfWidgetFormFilterInput(),
      'prix_lavage'                  => new sfWidgetFormFilterInput(),
      'commentaire_reglement'        => new sfWidgetFormFilterInput(),
      'date_reglement'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'etat'                         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'lnk_type_lavage_facture_list' => new sfWidgetFormPropelChoice(array('model' => 'RefTypeLavage', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_voiture'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TblVoiture', 'column' => 'id_voiture')),
      'id_type_lavage'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prix_lavage'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'commentaire_reglement'        => new sfValidatorPass(array('required' => false)),
      'date_reglement'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'etat'                         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'lnk_type_lavage_facture_list' => new sfValidatorPropelChoice(array('model' => 'RefTypeLavage', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_facture_filters[%s]');

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

    $criteria->addJoin(LnkTypeLavageFacturePeer::ID_FACTURE, TblFacturePeer::ID_FACTURE);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(LnkTypeLavageFacturePeer::ID_TYPE_LAVAGE, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(LnkTypeLavageFacturePeer::ID_TYPE_LAVAGE, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'TblFacture';
  }

  public function getFields()
  {
    return array(
      'id_facture'                   => 'Number',
      'id_voiture'                   => 'ForeignKey',
      'id_type_lavage'               => 'Number',
      'prix_lavage'                  => 'Number',
      'commentaire_reglement'        => 'Text',
      'date_reglement'               => 'Date',
      'etat'                         => 'Boolean',
      'lnk_type_lavage_facture_list' => 'ManyKey',
    );
  }
}