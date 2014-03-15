<?php

/**
 * TblTapis form.
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
class TblTapisForm extends BaseTblTapisForm {

    public function configure() {
        
        $this->setWidget('date_lavage_tapis', new orcaWidgetFormJQueryDate(array(
            'image' => "/images/pictos/calendar.png",
            'config' => '{firstDay: 1, buttonText: \'Changer la date\'}',
            'culture' => 'fr'
        )));
        $this->setDefault('date_lavage_tapis', date('Y/m/d'));
        $this->setValidator('date_lavage_tapis', new sfValidatorDate(array('required' => false)));

//        $this->setWidget('date_lavage_tapis', new sfWidgetFormInputText());
//        $this->setValidator('date_lavage_tapis', new sfValidatorDateTime());
//        $this->getWidget('date_lavage_tapis')->setAttribute('data-format', 'yyyy-MM-dd hh:mm:ss');
        
        $this->setWidget('taille_tapis', new sfWidgetFormInputText(array(), array("id" => 'tailleTapis')));
        $this->setValidator('taille_tapis', new sfValidatorString(array('required' => false)));

        $this->setWidget('prix_mettre_carre', new sfWidgetFormInputText(array(), array("id" => 'prixMettreCarre')));
        $this->setValidator('prix_mettre_carre', new sfValidatorString());
        
        $this->setWidget('montant_lavage_tapis', new sfWidgetFormInputText(array(), array("id" => 'montantLavageTapis')));
        $this->setValidator('montant_lavage_tapis', new sfValidatorString());

        $this->getWidgetSchema()->setLabels(array(
            'date_lavage_tapis' => 'date Lavage Tapis :',
            'taille_tapis' => 'Taille Tapis :',
            'prix_mettre_carre' => 'Prix pour le mettre carré :',
            'montant_lavage_tapis' => 'Montant :'
        ));
    }

}
