<?php

/**
 * TblUser form base class.
 *
 * @method TblUser getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'              => new sfWidgetFormInputHidden(),
      'user_nom'             => new sfWidgetFormInputText(),
      'user_prenom'          => new sfWidgetFormInputText(),
      'user_login'           => new sfWidgetFormInputText(),
      'user_password'        => new sfWidgetFormInputText(),
      'user_mail'            => new sfWidgetFormInputText(),
      'user_compte_active'   => new sfWidgetFormInputCheckbox(),
      'user_last_cnx'        => new sfWidgetFormDateTime(),
      'user_nb_cnx'          => new sfWidgetFormInputText(),
      'lnk_user_profil_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'RefProfil')),
    ));

    $this->setValidators(array(
      'user_id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getUserId()), 'empty_value' => $this->getObject()->getUserId(), 'required' => false)),
      'user_nom'             => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'user_prenom'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'user_login'           => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'user_password'        => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'user_mail'            => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'user_compte_active'   => new sfValidatorBoolean(array('required' => false)),
      'user_last_cnx'        => new sfValidatorDateTime(array('required' => false)),
      'user_nb_cnx'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'lnk_user_profil_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'RefProfil', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblUser';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lnk_user_profil_list']))
    {
      $values = array();
      foreach ($this->object->getLnkUserProfils() as $obj)
      {
        $values[] = $obj->getProfilId();
      }

      $this->setDefault('lnk_user_profil_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveLnkUserProfilList($con);
  }

  public function saveLnkUserProfilList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['lnk_user_profil_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(LnkUserProfilPeer::USER_ID, $this->object->getPrimaryKey());
    LnkUserProfilPeer::doDelete($c, $con);

    $values = $this->getValue('lnk_user_profil_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new LnkUserProfil();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setProfilId($value);
        $obj->save();
      }
    }
  }

}
