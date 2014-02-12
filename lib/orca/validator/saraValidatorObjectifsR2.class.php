<?php

class saraValidatorObjectifsR2 extends sfValidatorSchema {

  public function __construct($options = array(), $messages = array()) {
    $messages['required'] = 'Vous devez choisir au moins une activité.';
    parent::__construct(null, $options, $messages);
  }

  /**
   * @see sfValidatorBase
   */
  protected function doClean($values) {
    
//    if (!$values['lnk_structure_renault_form']['activite_VN'] &&
//        !$values['lnk_structure_renault_form']['activite_VO'] &&
//        !$values['lnk_structure_renault_form']['activite_PR'] &&
//        !$values['lnk_structure_renault_form']['activite_SER'] &&
//        !$values['lnk_structure_dacia_form']['activite_VN'] &&
//        !$values['lnk_structure_dacia_form']['activite_VO'] &&
//        !$values['lnk_structure_dacia_form']['activite_PR'] &&
//        !$values['lnk_structure_dacia_form']['activite_SER']) {
//      
//        throw new sfValidatorError($this, 'required');
////        $error_array = array();
////        $error_array['lnk_structure_renault_form'] = new sfValidatorError($this, 'required');
////        throw new sfValidatorErrorSchema($this, $error);
//      }
      
      return $values;
  }

}