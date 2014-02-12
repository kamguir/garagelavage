<?php

class orcaValidatorDateTimesText extends sfValidatorDate
{
    
    protected function configure($options = array(), $messages = array())
    {
        $this->addOption('format', 'Y-m-d H:i:s');
        parent::configure($options, $messages);
    }
    
    protected function doClean($value)
    {
        $value = trim($value);
        $date = DateTime::createFromFormat($this->getOption('format'), $value);
        if(!$date)
        {
            //cela peut venir de la session en formate datetime
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $value);
        }
        $date = parent::doClean(date_format($date, 'Y-m-d H:i:s'));
        return $date;
    }
}
