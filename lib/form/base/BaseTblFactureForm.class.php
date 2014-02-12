<?php

/**
 * TblFacture form base class.
 *
 * @method TblFacture getObject() Returns the current form's model object
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTblFactureForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_facture'                   => new sfWidgetFormInputHidden(),
      'id_voiture'                   => new sfWidgetFormPropelChoice(array('model' => 'TblVoiture', 'add_empty' => true)),
      'id_type_lavage'               => new sfWidgetFormInputText(),
      'prix_lavage'                  => new sfWidgetFormInputText(),
      'commentaire_reglement'        => new sfWidgetFormInputText(),
      'date_reglement'               => new sfWidgetFormDateTime(),
      'etat'                         => new sfWidgetFormInputCheckbox(),
      'lnk_type_lavage_facture_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'RefTypeLavage')),
    ));

    $this->setValidators(array(
      'id_facture'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdFacture()), 'empty_value' => $this->getObject()->getIdFacture(), 'required' => false)),
      'id_voiture'                   => new sfValidatorPropelChoice(array('model' => 'TblVoiture', 'column' => 'id_voiture', 'required' => false)),
      'id_type_lavage'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'prix_lavage'                  => new sfValidatorNumber(array('required' => false)),
      'commentaire_reglement'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'date_reglement'               => new sfValidatorDateTime(array('required' => false)),
      'etat'                         => new sfValidatorBoolean(array('required' => false)),
      'lnk_type_lavage_facture_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'RefTypeLavage', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tbl_facture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblFacture';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lnk_type_lavage_facture_list']))
    {
      $values = array();
      foreach ($this->object->getLnkTypeLavageFactures() as $obj)
      {
        $values[] = $obj->getIdTypeLavage();
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
    $c->add(LnkTypeLavageFacturePeer::ID_FACTURE, $this->object->getPrimaryKey());
    LnkTypeLavageFacturePeer::doDelete($c, $con);

    $values = $this->getValue('lnk_type_lavage_facture_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new LnkTypeLavageFacture();
        $obj->setIdFacture($this->object->getPrimaryKey());
        $obj->setIdTypeLavage($value);
        $obj->save();
      }
    }
  }

}
