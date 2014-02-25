<?php

class orcaValidatorDateText extends sfValidatorDate
{
    
    protected function configure($options = array(), $messages = array())
    {
        parent::configure($options, $messages);
        $this->addOption('format', 'Y-m-d');
        $this->addOption('bdd_format', 'Y-m-d');
    }
    
    protected function doClean($value)
    {
      if (version_compare(phpversion(), '5.3.8', '>=')) {
        $d = DateTime::createFromFormat($this->getOption('format')."|", $value);
        if($d==false)
        {
            $d = DateTime::createFromFormat($this->getOption('bdd_format')."|", $value);
        }
        $date = parent::doClean(date_format($d, 'Y-m-d H:i:s'));
      } else {
        $d = DateTime::createFromFormat($this->getOption('format'), $value);
        if($d==false)
        {
            $d = DateTime::createFromFormat($this->getOption('bdd_format'), $value);
        }
        $date = parent::doClean(date_format($d, 'Y-m-d 00:00:00'));
      }
        return $date;
    }
}
