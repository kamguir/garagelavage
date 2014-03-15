<?php

/**
 * RefProfil filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRefProfilFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profil_libelle'       => new sfWidgetFormFilterInput(),
      'lnk_user_profil_list' => new sfWidgetFormPropelChoice(array('model' => 'TblUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'profil_libelle'       => new sfValidatorPass(array('required' => false)),
      'lnk_user_profil_list' => new sfValidatorPropelChoice(array('model' => 'TblUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_profil_filters[%s]');

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

    $criteria->addJoin(LnkUserProfilPeer::PROFIL_ID, RefProfilPeer::PROFIL_ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(LnkUserProfilPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(LnkUserProfilPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'RefProfil';
  }

  public function getFields()
  {
    return array(
      'profil_id'            => 'Number',
      'profil_libelle'       => 'Text',
      'lnk_user_profil_list' => 'ManyKey',
    );
  }
}
