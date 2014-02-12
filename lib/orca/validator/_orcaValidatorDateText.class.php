<?php

class orcaValidatorDateText extends sfValidatorDate
{
    protected function doClean($value)
    {
      
      if (strstr($value, '/') !== false) {
        list($day,$month,$year) = explode("/", $value);
      } else {
        list($year,$month,$day) = explode("-", $value);
      }
      $date['year'] = $year;
      $date['month'] = $month;
      $date['day'] = $day;
        
        
//        $this->setOption("date_output", "d/m/Y");
        $date = parent::doClean($date);

        return $date;
    }
}
