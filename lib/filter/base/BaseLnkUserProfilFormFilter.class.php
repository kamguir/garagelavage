<?php

/**
 * LnkUserProfil filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLnkUserProfilFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('lnk_user_profil_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LnkUserProfil';
  }

  public function getFields()
  {
    return array(
      'user_id'   => 'ForeignKey',
      'profil_id' => 'ForeignKey',
    );
  }
}
