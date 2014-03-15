<?php

/**
 * TblUser filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_nom'             => new sfWidgetFormFilterInput(),
      'user_prenom'          => new sfWidgetFormFilterInput(),
      'user_login'           => new sfWidgetFormFilterInput(),
      'user_password'        => new sfWidgetFormFilterInput(),
      'user_mail'            => new sfWidgetFormFilterInput(),
      'user_compte_active'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'user_last_cnx'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_nb_cnx'          => new sfWidgetFormFilterInput(),
      'lnk_user_profil_list' => new sfWidgetFormPropelChoice(array('model' => 'RefProfil', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'user_nom'             => new sfValidatorPass(array('required' => false)),
      'user_prenom'          => new sfValidatorPass(array('required' => false)),
      'user_login'           => new sfValidatorPass(array('required' => false)),
      'user_password'        => new sfValidatorPass(array('required' => false)),
      'user_mail'            => new sfValidatorPass(array('required' => false)),
      'user_compte_active'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'user_last_cnx'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'user_nb_cnx'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lnk_user_profil_list' => new sfValidatorPropelChoice(array('model' => 'RefProfil', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addLnkUserProfilListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(LnkUserProfilPeer::USER_ID, TblUserPeer::USER_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(LnkUserProfilPeer::PROFIL_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(LnkUserProfilPeer::PROFIL_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'TblUser';
  }

  public function getFields()
  {
    return array(
      'user_id'              => 'Number',
      'user_nom'             => 'Text',
      'user_prenom'          => 'Text',
      'user_login'           => 'Text',
      'user_password'        => 'Text',
      'user_mail'            => 'Text',
      'user_compte_active'   => 'Boolean',
      'user_last_cnx'        => 'Date',
      'user_nb_cnx'          => 'Number',
      'lnk_user_profil_list' => 'ManyKey',
    );
  }
}
