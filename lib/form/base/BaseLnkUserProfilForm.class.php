<?php

/**
 * LnkUserProfil form base class.
 *
 * @method LnkUserProfil getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLnkUserProfilForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'   => new sfWidgetFormInputHidden(),
      'profil_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'   => new sfValidatorPropelChoice(array('model' => 'TblUser', 'column' => 'user_id', 'required' => false)),
      'profil_id' => new sfValidatorPropelChoice(array('model' => 'RefProfil', 'column' => 'profil_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lnk_user_profil[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LnkUserProfil';
  }


}
