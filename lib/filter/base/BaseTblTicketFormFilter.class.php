<?php

/**
 * TblTicket filter form base class.
 *
 * @package    garagelavage
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTblTicketFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_facture'         => new sfWidgetFormPropelChoice(array('model' => 'TblFacture', 'add_empty' => true)),
      'date_entree_garage' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_sortie_garage' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'id_facture'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TblFacture', 'column' => 'id_facture')),
      'date_entree_garage' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_sortie_garage' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('tbl_ticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TblTicket';
  }

  public function getFields()
  {
    return array(
      'id_ticket'          => 'Number',
      'id_facture'         => 'ForeignKey',
      'date_entree_garage' => 'Date',
      'date_sortie_garage' => 'Date',
    );
  }
}
