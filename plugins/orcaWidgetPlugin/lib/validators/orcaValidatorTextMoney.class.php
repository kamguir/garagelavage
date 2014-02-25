<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orcaValidatorTextMoney
 *
 * @author srathgeber
 */
class orcaValidatorTextMoney extends sfValidatorNumber
{

    protected function configure($options = array(), $messages = array())
    {
        $this->addOption('dec_point', ".");
        $this->addOption('thousands_sep', ",");

        parent::configure($options, $messages);
    }

    protected function doClean($value)
    {
        $arr1 = array($this->getOption("dec_point"), $this->getOption("thousands_sep"));
        $arr2 = array('.', '');

        return parent::doClean(str_replace($arr1, $arr2, $value));
    }

}
