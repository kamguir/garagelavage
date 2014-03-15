<?php

/**
 * RefProfil form base class.
 *
 * @method RefProfil getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefProfilForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profil_id'            => new sfWidgetFormInputHidden(),
      'profil_libelle'       => new sfWidgetFormInputText(),
      'lnk_user_profil_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'TblUser')),
    ));

    $this->setValidators(array(
      'profil_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getProfilId()), 'empty_value' => $this->getObject()->getProfilId(), 'required' => false)),
      'profil_libelle'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'lnk_user_profil_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'TblUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_profil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefProfil';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lnk_user_profil_list']))
    {
      $values = array();
      foreach ($this->object->getLnkUserProfils() as $obj)
      {
        $values[] = $obj->getUserId();
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
    $c->add(LnkUserProfilPeer::PROFIL_ID, $this->object->getPrimaryKey());
    LnkUserProfilPeer::doDelete($c, $con);

    $values = $this->getValue('lnk_user_profil_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new LnkUserProfil();
        $obj->setProfilId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
  }

}
