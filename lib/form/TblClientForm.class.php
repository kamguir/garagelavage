<?php

/**
 * TblClient form.
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
class TblClientForm extends BaseTblClientForm
{
  public function configure()
  {
       $this->widgetSchema['cin_client'] = new sfWidgetFormInputText();
        $this->validatorSchema['cin_client'] = new sfValidatorString(array('required' => false));
        
       $this->widgetSchema['nom_client'] = new sfWidgetFormInputText();
        $this->validatorSchema['nom_client'] = new sfValidatorString();
       
        $this->widgetSchema['prenom_client'] = new sfWidgetFormInputText();
        $this->validatorSchema['prenom_client'] = new sfValidatorString();
        
        $this->widgetSchema['situation'] = new sfWidgetFormPropelChoice(array('model' => 'refSituation', 'add_empty' => false));
        $this->validatorSchema['situation'] = new sfValidatorPropelChoice(array('model' => 'refSituation', 'required' => false));
        $this->widgetSchema['situation']->setDefault(1);
      
        $this->widgetSchema['age_client'] = new sfWidgetFormInputText(array(), array("id"=>'age_client'));
        $this->validatorSchema['age_client'] = new sfValidatorInteger(array('required' => false));
       
        $this->widgetSchema['num_tel'] = new sfWidgetFormInputText();
        $this->validatorSchema['num_tel'] = new sfValidatorString(array('required' => false));
        
        $this->widgetSchema['adresse_client'] = new sfWidgetFormInputText(array(), array("id"=>'adresse_client'));
        $this->validatorSchema['adresse_client'] = new sfValidatorString(array('required' => false));
        
        $this->widgetSchema['fonction_client'] = new sfWidgetFormInputText();
        $this->validatorSchema['fonction_client'] = new sfValidatorString(array('required' => false));

        $this->getWidgetSchema()->setLabels(array(
            'cin_client' => 'CIN client :',
            'nom_client' => 'Nom :',
            'prenom_client' => 'Prenom :',
            'situation' => 'Situation :',
            'age_client' => 'Age :',
            'num_tel' => 'Téléphone :',
            'adresse_client' => 'Adresse :',
            'fonction_client' => 'Fonction :'
        ));
  }
}
