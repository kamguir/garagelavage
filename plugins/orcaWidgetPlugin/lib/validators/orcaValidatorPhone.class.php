<?php

class orcaValidatorPhone extends sfValidatorRegex
{
    
    protected function configure($options = array(), $messages = array())
    {
        $this->addOption('pattern', '/^[0|0033|+33][1-9]{1}.?[0-9]{2}.?[0-9]{2}.?[0-9]{2}.?[0-9]{2}[ ]*$/');
        $this->addOption('char_remove',array('.',' '));
        parent::configure($options, $messages);
    }
    
    protected function doClean($value)
    {
        $value = parent::doClean($value);
        $value = str_replace($this->getOption('char_remove'), '', $value);
        $value = str_replace('+', '00', $value);
        $value = str_replace('0033', '0', $value);
        return $value;
    }
}