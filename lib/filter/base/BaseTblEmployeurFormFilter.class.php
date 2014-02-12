<?php

/**
 * TblEmployeur filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblEmployeurFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom_employeur'           => new sfWidgetFormFilterInput(),
      'prenom_employeur'        => new sfWidgetFormFilterInput(),
      'nom_societe'             => new sfWidgetFormFilterInput(),
      'num_telephone_employeur' => new sfWidgetFormFilterInput(),
      'adresse_societe'         => new sfWidgetFormFilterInput(),
      'ville_societe'           => new sfWidgetFormFilterInput(),
      'adresse_email'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom_employeur'           => new sfValidatorPass(array('required' => false)),
      'prenom_employeur'        => new sfValidatorPass(array('required' => false)),
      'nom_societe'             => new sfValidatorPass(array('required' => false)),
      'num_telephone_employeur' => new sfValidatorPass(array('required' => false)),
      'adresse_societe'         => new sfValidatorPass(array('required' => false)),
      'ville_societe'           => new sfValidatorPass(array('required' => false)),
      'adresse_email'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_employeur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblEmployeur';
  }

  public function getFields()
  {
    return array(
      'id_employeur'            => 'Number',
      'nom_employeur'           => 'Text',
      'prenom_employeur'        => 'Text',
      'nom_societe'             => 'Text',
      'num_telephone_employeur' => 'Text',
      'adresse_societe'         => 'Text',
      'ville_societe'           => 'Text',
      'adresse_email'           => 'Text',
    );
  }
}
