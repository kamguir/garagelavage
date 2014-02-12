<?php

/**
 * TblFacture form.
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
class TblFactureForm extends BaseTblFactureForm {

    public function configure() {

        //
        $idVoiture = $this->getOption('idVoiture');
//        var_dump($this->getOption('idVoiture'));
//        var_dump($idVoiture->getImmatriculation());die;
        
        // id voiture
        $this->setWidget("id_voiture", new sfWidgetFormPropelChoice(array('model' => 'tblVoiture', 'add_empty' => false)));
        $this->setValidator('id_voiture', new sfValidatorPropelChoice(array('model' => 'tblVoiture', 'required' => false)));
        if($idVoiture){
            $this->widgetSchema['id_voiture']->setDefault($idVoiture);
        }else{
            $this->widgetSchema['id_voiture']->setDefault(1);
        }
        
        $widgetDateTime = new orcaWidgetFormDateText(array('format' => 'Y-m-d H:i:s', 'form' => $this));
        $validatorDateTime = new orcaValidatorDateTimesText(array('with_time' => true, 'format' => 'd/m/Y H:i'));

        $this->setWidget('date_reglement', $widgetDateTime);
        $this->getWidget('date_reglement')->setOption('format', 'Y-m-d H:i:s');
        $this->setValidator('date_reglement', $validatorDateTime);
        $this->setDefault('date_reglement', date('Y-m-d H:i:s'));

        //type Lavage
        $typeLavageSelected = LnkTypeLavageFactureQuery::create()
                ->filterByIdFacture($this->getObject()->getIdFacture())
                ->find();
        $qRefTypeLavage = RefTypeLavageQuery::Create();
        $this->setWidget("lnk_type_lavage_facture_list", new sfWidgetFormPropelChoice(array('model' => 'refTypeLavage', 'criteria' => $qRefTypeLavage, 'method' => 'getLibelle', 'multiple' => true, 'expanded' => true)));
        $this->setValidator('lnk_type_lavage_facture_list', new sfValidatorPropelChoice(array('model' => 'refTypeLavage', 'multiple' => true, 'required' => false)));
        if ($typeLavageSelected) {
            // si update chargé les types lavages
            $values = array();
            foreach ($typeLavageSelected as $obj) {
                $values[] = $obj->getIdTypeLavage();
            }
            $this->setDefault('lnk_type_lavage_facture_list', $values);


            $this->getWidgetSchema()->setLabels(array(
                'date_reglement' => 'Choisir Date :',
                'lnk_type_lavage_facture_list' => 'Type Lavage :'
            ));
        }
    }

}

