<?php

/**
 * TblVoiture filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblVoitureFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_client'       => new sfWidgetFormPropelChoice(array('model' => 'TblClient', 'add_empty' => true)),
      'immatriculation' => new sfWidgetFormFilterInput(),
      'id_marque'       => new sfWidgetFormPropelChoice(array('model' => 'RefMarque', 'add_empty' => true)),
      'id_motorisation' => new sfWidgetFormPropelChoice(array('model' => 'RefMotorisation', 'add_empty' => true)),
      'couleur'         => new sfWidgetFormFilterInput(),
      'nbr_portes'      => new sfWidgetFormPropelChoice(array('model' => 'RefNbrPortes', 'add_empty' => true)),
      'modele'          => new sfWidgetFormFilterInput(),
      'annee'           => new sfWidgetFormFilterInput(),
      'nb_visite'       => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'deleted_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'id_client'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TblClient', 'column' => 'id_client')),
      'immatriculation' => new sfValidatorPass(array('required' => false)),
      'id_marque'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RefMarque', 'column' => 'marque_id')),
      'id_motorisation' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RefMotorisation', 'column' => 'id_motorisation')),
      'couleur'         => new sfValidatorPass(array('required' => false)),
      'nbr_portes'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RefNbrPortes', 'column' => 'id_nbr_portes')),
      'modele'          => new sfValidatorPass(array('required' => false)),
      'annee'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nb_visite'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'deleted_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('tbl_voiture_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblVoiture';
  }

  public function getFields()
  {
    return array(
      'id_voiture'      => 'Number',
      'id_client'       => 'ForeignKey',
      'immatriculation' => 'Text',
      'id_marque'       => 'ForeignKey',
      'id_motorisation' => 'ForeignKey',
      'couleur'         => 'Text',
      'nbr_portes'      => 'ForeignKey',
      'modele'          => 'Text',
      'annee'           => 'Number',
      'nb_visite'       => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
      'deleted_at'      => 'Date',
    );
  }
}
