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

        if ($this->isNew()) {
            $this->widgetSchema['num1Matricule'] = new sfWidgetFormInputText(array(), array("style" => 'width: 100%;', "id" => 'num1Matricule'));
            $this->validatorSchema['num1Matricule'] = new sfValidatorString();
            $this->widgetSchema['chiffreMatricule'] = new sfWidgetFormChoice(array('choices' => array(
                    'أ' => 'أ',
                    'ب' => 'ب',
                    'ت' => 'ت',
//                '&#1664' => 'د',
                    'د' => 'د',
                    'ھ' => 'ھ',)), array("style" => 'width: 70%;'));
            $this->validatorSchema['chiffreMatricule'] = new sfValidatorPass();
            $this->widgetSchema['num2Matricule'] = new sfWidgetFormInputText(array(), array("style" => 'width: 100%;', "id" => 'num2Matricule'));
            $this->validatorSchema['num2Matricule'] = new sfValidatorString();
        } else {
            $this->widgetSchema['immatriculation'] = new sfWidgetFormInputText(array(), array("id" => 'input'));
            $this->validatorSchema['immatriculation'] = new sfValidatorString();
        }

        // juste les Clients
        $qIdClient = TblClientQuery::Create()->filterByIsEmploye(0);
        $this->setWidget("id_client", new sfWidgetFormPropelChoice(array('model' => 'tblClient', 'criteria' => $qIdClient, 'add_empty' => false)));
        $this->setValidator('id_client', new sfValidatorPropelChoice(array('model' => 'tblClient', 'required' => true)));
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

        $this->getWidgetSchema()->setLabels(array(
            'id_client' => 'Client :',
//            'immatriculation' => 'Immatriculation ',
            'id_marque' => 'Marque :',
            'id_motorisation' => 'Motorisation :',
            'couleur' => 'Couleur :',
            'nbr_portes' => 'Nombre Portes :',
            'modele' => 'Modele :',
            'annee' => 'Annee :'
        ));
    }

    public function save($con = null) {
//        var_dump($this->getValue('num1Matricule'));
//        die;
//        var_dump($this->getValues());
//        die;
        parent::save($con);
        $object = $this->getObject();

        if ($this->isNew()) {
            // récuperer immatriculation
            $newImmat = $this->getValue('num1Matricule') . '/' . $this->getValue('chiffreMatricule') . '/' . $this->getValue('num2Matricule');
            $object->setImmatriculation($newImmat);
        }


        $tblVoitures = TblVoitureQuery::create()
                ->filterByImmatriculation($newImmat)
                ->withColumn('MAX(' . TblVoiturePeer::NB_VISITE . ')', "nbrVisite")
                ->select('nbrVisite')
                ->findOne();
        $nbrVisite = $tblVoitures + 1;
        $object->setNbVisite($nbrVisite);
        $object->save();

        // ajouter Voiture a objectif realisé tbl_objectif
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
