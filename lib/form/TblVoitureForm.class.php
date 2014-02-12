<?php

/**
 * TblVoiture form.
 *
 * @package    garagelavage
 * @subpackage form
 * @author     Your name here
 */
class TblVoitureForm extends BaseTblVoitureForm {

    public function configure() {

//        $idTypeLavage = $this->getOption('libelleRefTypeLavage');
//        $prixLavage = null;
//        $dateReglementFacture = null;
//
//        $typeLavageSelected = LnkTypeLavageFactureQuery::create()
//                ->useTblFactureQuery()
//                ->filterByIdVoiture($this->getObject()->getIdVoiture())
//                ->endUse()
//                ->find();
//        $qRefTypeLavage = RefTypeLavageQuery::Create();
//        $this->setWidget("libelleRefTypeLavage", new sfWidgetFormPropelChoice(array('model' => 'refTypeLavage', 'criteria' => $qRefTypeLavage, 'method' => 'getLibelle', 'multiple' => true, 'expanded' => true)));
//        $this->setValidator('libelleRefTypeLavage', new sfValidatorPropelChoice(array('model' => 'refTypeLavage', 'multiple' => true, 'required' => false)));
//        if ($typeLavageSelected) {
//            // si update chargé les types lavages
//            $values = array();
//            foreach ($typeLavageSelected as $obj) {
//                $values[] = $obj->getIdTypeLavage();
//            }
//            $this->setDefault('libelleRefTypeLavage', $values);
//        }

        // afficher le prix Lavage dans formulaire Edit
//        $maFacture = TblFactureQuery::create()->filterByIdVoiture($this->getObject()->getIdVoiture())->findOne();
//        if ($maFacture) {
//            $prixLavage = $maFacture->getPrixLavage();
//            $dateReglementFacture = $maFacture->getDateReglement();
//        }

//        $this->setWidget('montant_lavage', new sfWidgetFormInputText());
//        $this->setValidator('montant_lavage', new sfValidatorString());
//        $this->getWidget('montant_lavage')->setDefault($prixLavage);
//        $this->getWidget('defaultprix')->setAttribute('disabled', 'disabled');

        $this->widgetSchema['immatriculation'] = new sfWidgetFormInputText(array(), array("id" => 'input'));
        $this->validatorSchema['immatriculation'] = new sfValidatorString();

        $this->setWidget("id_client", new sfWidgetFormPropelChoice(array('model' => 'tblClient', 'add_empty' => false)));
        $this->setValidator('id_client', new sfValidatorPropelChoice(array('model' => 'tblClient', 'required' => false)));
        $this->widgetSchema['id_client']->setDefault(1);

        $this->setWidget("id_marque", new sfWidgetFormPropelChoice(array('model' => 'refMarque', 'add_empty' => false)));
        $this->setValidator('id_marque', new sfValidatorPropelChoice(array('model' => 'refMarque', 'required' => false)));
        $this->widgetSchema['id_marque']->setDefault(RefMarque::IDFORD);

        $this->setWidget("id_motorisation", new sfWidgetFormPropelChoice(array('model' => 'refMotorisation', 'add_empty' => false)));
        $this->setValidator('id_motorisation', new sfValidatorPropelChoice(array('model' => 'refMotorisation', 'required' => false)));
        $this->widgetSchema['id_motorisation']->setDefault(RefMotorisation::IDDIESEL);

        $this->widgetSchema['couleur'] = new sfWidgetFormInputText(array(), array("class" => 'color'));
        $this->validatorSchema['couleur'] = new sfValidatorString();
        
        $this->validatorSchema['nbr_portes'] = new sfValidatorPropelChoice(array('model' => 'refNbrPortes', 'required' => false));
        $this->widgetSchema['nbr_portes']->setDefault(5);

        $this->widgetSchema['modele'] = new sfWidgetFormInputText(array(), array("id" => 'modele'));
        $this->validatorSchema['modele'] = new sfValidatorString(array('required' => false));
        
        $this->widgetSchema['annee'] = new sfWidgetFormInputText(array(), array("id" => 'annee'));
        $this->validatorSchema['annee'] = new sfValidatorString(array('required' => false));

//        $widgetDateTime = new orcaWidgetFormDateText(array('format' => 'Y-m-d H:i:s', 'form' => $this));
//        $validatorDateTime = new orcaValidatorDateTimesText(array('with_time' => true, 'format' => 'd/m/Y H:i'));

//        $this->setWidget('date_reglement', $widgetDateTime);
//        $this->getWidget('date_reglement')->setOption('format', 'Y-m-d H:i:s');
//        $this->setValidator('date_reglement', $validatorDateTime);
//        if ($dateReglementFacture) {
//            $this->getWidget('date_reglement')->setDefault($dateReglementFacture);
//        } else {
//            $this->setDefault('date_reglement', date('Y-m-d H:i:s'));
//        }

        $this->getWidgetSchema()->setLabels(array(
            'id_client' => 'Client :',
            'immatriculation' => 'Immatriculation :',
            'id_marque' => 'Marque :',
            'id_motorisation' => 'Motorisation :',
            'couleur' => 'Couleur :',
            'nbr_portes' => 'Nombre Portes :',
            'modele' => 'Modele :',
//            'libelleRefTypeLavage' => 'Type Lavage :',
            'annee' => 'Annee :'
//            'date_reglement' => 'Choisir Date :',
//            'defaultprix' => 'Default prix'
        ));
    }

    public function save($con = null) {

        parent::save($con);
//        var_dump($this->form->getValues());die;
        $object = $this->getObject();
        $tblVoitures = TblVoitureQuery::create()
                ->filterByImmatriculation($object->getImmatriculation())
                ->withColumn('MAX(' . TblVoiturePeer::NB_VISITE . ')', "nbrVisite")
                ->select('nbrVisite')
                ->findOne();
        $nbrVisite = $tblVoitures + 1;
        $object->setNbVisite($nbrVisite);
        $object->save();

        //sauvegarder Factures
//        $tblfactures = new TblFacture();
//        $tblfactures->setIdVoiture($object->getIdVoiture());
//        $tblfactures->setDateReglement($this->getValue('date_reglement'));
//        $tblfactures->setPrixLavage($this->getValue('montant_lavage'));
//        $tblfactures->setEtat(0);
//        $tblfactures->save();
//
//        //sauvegarder lnkTypeLavageFacture
//        $valuesSelectedTypeLavage = $this->getValue('libelleRefTypeLavage');
//        if (is_array($valuesSelectedTypeLavage)) {
//            foreach ($valuesSelectedTypeLavage as $value) {
//                $lnkTyprLavageFacture = new LnkTypeLavageFacture();
//                $lnkTyprLavageFacture->setIdFacture($tblfactures->getIdFacture());
//                $lnkTyprLavageFacture->setIdTypeLavage($value);
//                $lnkTyprLavageFacture->save();
//            }
//        } else {
//            $lnkTyprLavageFacture = new LnkTypeLavageFacture();
//            $lnkTyprLavageFacture->setIdFacture($tblfactures->getIdFacture());
//            $lnkTyprLavageFacture->setIdTypeLavage($valuesSelectedTypeLavage);
//            $lnkTyprLavageFacture->save();
//        }
//
//        //sauvegarder Ticket
//        $ticket = new TblTicket();
//        $ticket->setIdFacture($tblfactures->getIdFacture());
//        $ticket->setDateEntreeGarage(date('Y-m-d'));
////        $ticket->setDateSortieGarage($ticket)
//        $ticket->save();
//
//        // ajouter Voiture a objectif realisé tbl_objectif
//        $mois = date('m');
//        $annee = date('Y');
//        $moisCourant = 'MONTH(' . TblObjectifPeer::OBJECTIF_DATE . ')=' . $mois;
//        $anneeCourante = 'YEAR(' . TblObjectifPeer::OBJECTIF_DATE . ')=' . $annee;
//        $monObjectif = TblObjectifQuery::create()
//                ->addAnd(TblObjectifPeer::OBJECTIF_DATE, $moisCourant, Criteria::CUSTOM)
//                ->addAnd(TblObjectifPeer::OBJECTIF_DATE, $anneeCourante, Criteria::CUSTOM)
//                ->findOne();
//        if ($monObjectif) {
//            $monObjectifRealise = $monObjectif->getObjectifRealise();
//            $monObjectif->setObjectifRealise($monObjectifRealise + 1);
//            $monObjectif->save();
//        }
    }

}
