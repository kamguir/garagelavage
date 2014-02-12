<?php

/**
 * TblFacture filter form.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
class TblFactureFormFilter extends BaseTblFactureFormFilter
{
  public function configure()
  {
       //date reglement facture
        $listFacture = TblFactureQuery::create()->groupByDateReglement();
        $this->setWidget("date_reglement_Facture", new sfWidgetFormPropelChoice(array('model' => 'TblFacture','method'=> 'getDateReglement','key_method'=>'getDateReglement',  'criteria' => $listFacture, 'add_empty' => true)));
        $this->getWidget('date_reglement_Facture')->setOption("add_empty", "- Tous -")
                ->setAttribute("onChange", "submit()");
        $this->setValidator("date_reglement_Facture", new sfValidatorDateTime(array('required' => false)));

        $this->useFields(array('date_reglement_Facture'));

        $this->getWidgetSchema()->setLabels(array(
            'date_reglement_Facture' => "Date Réglement :"
        ));
  }
}
