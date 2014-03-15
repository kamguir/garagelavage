<?php

/**
 * TblClient filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblClientFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cin_client'      => new sfWidgetFormFilterInput(),
      'nom_client'      => new sfWidgetFormFilterInput(),
      'prenom_client'   => new sfWidgetFormFilterInput(),
      'situation'       => new sfWidgetFormPropelChoice(array('model' => 'RefSituation', 'add_empty' => true)),
      'age_client'      => new sfWidgetFormFilterInput(),
      'num_tel'         => new sfWidgetFormFilterInput(),
      'adresse_client'  => new sfWidgetFormFilterInput(),
      'fonction_client' => new sfWidgetFormFilterInput(),
      'is_employe'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'cin_client'      => new sfValidatorPass(array('required' => false)),
      'nom_client'      => new sfValidatorPass(array('required' => false)),
      'prenom_client'   => new sfValidatorPass(array('required' => false)),
      'situation'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RefSituation', 'column' => 'id_situation')),
      'age_client'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'num_tel'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'adresse_client'  => new sfValidatorPass(array('required' => false)),
      'fonction_client' => new sfValidatorPass(array('required' => false)),
      'is_employe'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('tbl_client_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblClient';
  }

  public function getFields()
  {
    return array(
      'id_client'       => 'Number',
      'cin_client'      => 'Text',
      'nom_client'      => 'Text',
      'prenom_client'   => 'Text',
      'situation'       => 'ForeignKey',
      'age_client'      => 'Number',
      'num_tel'         => 'Number',
      'adresse_client'  => 'Text',
      'fonction_client' => 'Text',
      'is_employe'      => 'Boolean',
    );
  }
}
