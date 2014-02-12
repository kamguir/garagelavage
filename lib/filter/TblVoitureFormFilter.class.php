<?php

/**
 * TblVoiture filter form.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
class TblVoitureFormFilter extends BaseTblVoitureFormFilter {

    public function configure() {
        
        //nom & prenom Client
        $listClients = TblClientQuery::create()->groupByIdClient();   
        $this->setWidget("id_client", new sfWidgetFormPropelChoice(array('model' => 'TblClient', 'criteria' => $listClients, 'add_empty' => true)));
        $this->getWidget('id_client')->setOption("add_empty", "- Tous -")
                ->setAttribute("onChange", "submit()");
        $this->setValidator("id_client", new sfValidatorPropelChoice(array('model' => 'TblClient', 'required' => false)));

        //date reglement facture
        $listFacture = TblFactureQuery::create()->groupByDateReglement();
        $this->setWidget("date_reglement", new sfWidgetFormPropelChoice(array('model' => 'TblFacture','method'=> 'getDateReglement','key_method'=>'getDateReglement',  'criteria' => $listFacture, 'add_empty' => true)));
        $this->getWidget('date_reglement')->setOption("add_empty", "- Tous -")
                ->setAttribute("onChange", "submit()");
        $this->setValidator("date_reglement", new sfValidatorDateTime(array('required' => false)));

        $this->useFields(array('id_client','date_reglement'));

        $this->getWidgetSchema()->setLabels(array(
            'id_client' => "Client :",
            'date_reglement' => "Date Réglement :"
        ));
    }

}
