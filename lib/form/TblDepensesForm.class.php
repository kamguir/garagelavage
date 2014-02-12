<?php

/**
 * TblDepenses form.
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
class TblDepensesForm extends BaseTblDepensesForm {
    
    private $tblReponse = array('0'=>'Non','1'=>'Oui');
    
    public function configure() {
        
        $this->setWidget('date_depenses', new orcaWidgetFormJQueryDate(array(
            'image' => "/images/pictos/calendar.png",
            'config' => '{firstDay: 1, buttonText: \'Changer la date\'}',
            'culture' => 'fr'
        )));
        $this->setDefault('date_depenses', date('Y/m/d'));
        $this->setValidator('date_depenses', new sfValidatorDate(array('required' => false)));

        $this->setWidget("id_ref_depenses", new sfWidgetFormPropelChoice(array('model' => 'refDepenses', 'add_empty' => "- Aucun -")));
        $this->setValidator('id_ref_depenses', new sfValidatorPropelChoice(array('model' => 'refMarque', 'required' => true)));


        $this->setWidget('montant_depenses', new sfWidgetFormInputText());
        $this->setValidator('montant_depenses', new sfValidatorString());

        $this->widgetSchema['etat_payement'] = new sfWidgetFormChoice(array(
            'choices' => $this->tblReponse,
            'multiple' => false, 'expanded' => true
        ));

        $this->validatorSchema['etat_payement'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->tblReponse),
            'multiple' => false,
            'required' => false
        ));

//        if($this->tblReponse)
//        {
//            $cocher[] = 1;
//        }  else {
//            $cocher[] = 0;
//        }
        
//        $this->getWidget('etat_payement')->setDefault($cocher);
        
        $this->getWidgetSchema()->setLabels(array(
            'date_depenses' => 'Choisir date :',
            'montant_depenses' => 'Montant (dh) :',
            'id_ref_depenses' => 'Type dépenses :',
            'etat_payement' => 'payer ? :'
        ));
    }

}
