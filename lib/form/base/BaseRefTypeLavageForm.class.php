<?php

/**
 * RefTypeLavage form base class.
 *
 * @method RefTypeLavage getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRefTypeLavageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_type_lavage'               => new sfWidgetFormInputHidden(),
      'libelle'                      => new sfWidgetFormInputText(),
      'montant_lavage'               => new sfWidgetFormInputText(),
      'time_lavage'                  => new sfWidgetFormTime(),
      'lnk_type_lavage_facture_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'TblFacture')),
    ));

    $this->setValidators(array(
      'id_type_lavage'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdTypeLavage()), 'empty_value' => $this->getObject()->getIdTypeLavage(), 'required' => false)),
      'libelle'                      => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'montant_lavage'               => new sfValidatorNumber(array('required' => false)),
      'time_lavage'                  => new sfValidatorTime(array('required' => false)),
      'lnk_type_lavage_facture_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'TblFacture', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ref_type_lavage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RefTypeLavage';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lnk_type_lavage_facture_list']))
    {
      $values = array();
      foreach ($this->object->getLnkTypeLavageFactures() as $obj)
      {
        $values[] = $obj->getIdFacture();
      }

      $this->setDefault('lnk_type_lavage_facture_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveLnkTypeLavageFactureList($con);
  }

  public function saveLnkTypeLavageFactureList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['lnk_type_lavage_facture_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(LnkTypeLavageFacturePeer::ID_TYPE_LAVAGE, $this->object->getPrimaryKey());
    LnkTypeLavageFacturePeer::doDelete($c, $con);

    $values = $this->getValue('lnk_type_lavage_facture_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new LnkTypeLavageFacture();
        $obj->setIdTypeLavage($this->object->getPrimaryKey());
        $obj->setIdFacture($value);
        $obj->save();
      }
    }
  }

}
