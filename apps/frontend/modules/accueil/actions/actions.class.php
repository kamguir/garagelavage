<?php

/**
 * accueil actions.
 *
 * @package    garagelavage
 * @subpackage accueil
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accueilActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->mesVelues = TblObjectifQuery::create()
                ->filterByObjectifDate(array('min' => '2013-01-01', 'max' => '2013-12-31'))
                ->find();

        $this->nbrVoitures = TblVoitureQuery::create()
//            ->filterByIdMarque($idMarque)
                ->findOne();
        
        $this->tblFactures = TblFactureQuery::create()
//                ->getMontantTotalParDate()
//                ->filterByDateReglement('2013-11-01')
//                ->filterByMontantTotalParDate()
                ->findOne();
        
        $this->objectifsFixes = TblObjectifQuery::create()
                ->findOne();

        $this->tblTapis = TblTapisQuery::create()
                ->findOne();
        
        $this->tblClients = TblClientQuery::create()
                ->filterByIsEmploye(1)
                ->find();
    }

    public function executeHh() {
        
    }
    public function executeAlerts() {
         $this->mesVelues = TblObjectifQuery::create()
                ->filterByObjectifDate(array('min' => '2013-01-01', 'max' => '2013-12-31'))
                ->find();
         
         $this->objectifsFixes = TblObjectifQuery::create()
                ->findOne();
    }

}
