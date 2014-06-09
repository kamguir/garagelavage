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

        // id voiture
        $idVoiture = $this->getOption('idVoiture');
        $this->setWidget("id_voiture", new sfWidgetFormPropelChoice(array('model' => 'tblVoiture', 'add_empty' => false)));
        $this->setValidator('id_voiture', new sfValidatorPropelChoice(array('model' => 'tblVoiture', 'required' => true)));
        if ($idVoiture) {
            $this->widgetSchema['id_voiture']->setDefault($idVoiture);
        } else {
            $this->widgetSchema['id_voiture']->setDefault(1);
        }

        // is_employé tblClient
        $qIdEmploye = TblClientQuery::Create()->filterByIsEmploye(1);
        $this->setWidget("id_employe", new sfWidgetFormPropelChoice(array('model' => 'tblClient', 'criteria' => $qIdEmploye, 'add_empty' => false)));
        $this->setValidator('id_employe', new sfValidatorPropelChoice(array('model' => 'tblClient', 'required' => true)));

        $widgetDateTime = new orcaWidgetFormDateText(array('format' => 'Y-m-d H:i:s', 'form' => $this));
        $validatorDateTime = new orcaValidatorDateTimesText(array('with_time' => true, 'format' => 'd/m/Y H:i'));

        $this->setWidget('date_reglement', $widgetDateTime);
        $this->getWidget('date_reglement')->setOption('format', 'Y-m-d H:i:s');
        $this->setValidator('date_reglement', $validatorDateTime);
        $this->setDefault('date_reglement', date('Y-m-d H:i:s'));

        // Prix Lavage
        $this->widgetSchema['prix_lavage'] = new sfWidgetFormInputText();
        $this->validatorSchema['prix_lavage'] = new sfValidatorString(array('required' => false));

        //type Lavage
        $typeLavageSelected = LnkTypeLavageFactureQuery::create()
                ->filterByIdFacture($this->getObject()->getIdFacture())
                ->find();
        $qRefTypeLavage = RefTypeLavageQuery::Create();
        $this->setWidget("lnk_type_lavage_facture_list", new sfWidgetFormPropelChoice(array('model' => 'refTypeLavage', 'criteria' => $qRefTypeLavage, 'method' => 'getLibelle', 'multiple' => true, 'expanded' => true), array('style' => 'list-style-type:none;')));
        $this->setValidator('lnk_type_lavage_facture_list', new sfValidatorPropelChoice(array('model' => 'refTypeLavage', 'multiple' => true, 'required' => true)));
        if ($typeLavageSelected) {
            // si update chargé les types lavages
            $values = array();
            foreach ($typeLavageSelected as $obj) {
                $values[] = $obj->getIdTypeLavage();
            }
            $this->setDefault('lnk_type_lavage_facture_list', $values);
        }

        //etat 
        $this->widgetSchema['etat'] = new sfWidgetFormInputCheckbox();
        $this->setDefault('etat', true);

        $this->getWidgetSchema()->setLabels(array(
            'date_reglement' => 'Choisir Date :',
            'is_employe' => 'Nom Employé :',
            'prix_lavage' => 'Prix lavage :',
            'lnk_type_lavage_facture_list' => 'Type Lavage :'
        ));
    }

    public function save($con = null) {
//        var_dump($this->getValue('num1Matricule'));
//        die;
//        var_dump($this->getValues());
//        die;
        parent::save($con);
        // ajouter facture a objectif realisé tbl_objectif
        $mois = date('m');
        $annee = date('Y');
        $moisCourant = 'MONTH(' . TblObjectifPeer::OBJECTIF_DATE . ')=' . $mois;
        $anneeCourante = 'YEAR(' . TblObjectifPeer::OBJECTIF_DATE . ')=' . $annee;
        $monObjectif = TblObjectifQuery::create()
                ->addAnd(TblObjectifPeer::OBJECTIF_DATE, $moisCourant, Criteria::CUSTOM)
                ->addAnd(TblObjectifPeer::OBJECTIF_DATE, $anneeCourante, Criteria::CUSTOM)
                ->findOne();
        if ($monObjectif) {
            $monObjectifRealise = $monObjectif->getObjectifRealise();
            $monObjectif->setObjectifRealise($monObjectifRealise + 1);
            $monObjectif->save();
        }
    }

}
