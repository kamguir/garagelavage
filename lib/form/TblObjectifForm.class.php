<?php

/**
 * TblObjectif form.
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
class TblObjectifForm extends BaseTblObjectifForm {

    public function configure() {
        
        $this->setWidget('objectif_date', new orcaWidgetFormJQueryDate(array(
//            'date_widget' => new sfWidgetFormDate(array('format' => '%month%/%year%')),
            'image' => "/images/pictos/calendar.png",
            'config' => '{firstDay: 1, buttonText: \'Changer la date\'}',
            'culture' => 'fr'
        )));
        $this->setDefault('objectif_date', date('Y/m/d'));
        $this->setValidator('objectif_date', new sfValidatorDate(array('required' => false)));

        $this->setWidget('objectif_fixe', new sfWidgetFormInputText(array(), array("class" => 'objectif_fixe')));
        $this->setValidator('objectif_fixe', new sfValidatorString());

        $this->setWidget('objectif_realise', new sfWidgetFormInputText());
        $this->setValidator('objectif_realise', new sfValidatorString());

        $this->getWidgetSchema()->setLabels(array(
            'objectif_date' => 'Choisir Date :',
            'objectif_fixe' => 'Objectif Fix :',
            'objectif_realise' => 'Objectif Réalisé :'
        ));
    }

}
