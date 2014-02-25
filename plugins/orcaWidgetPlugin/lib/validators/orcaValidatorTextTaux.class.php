<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orcaValidatorTextTaux
 *
 * @author srathgeber
 */
class orcaValidatorTextTaux extends orcaValidatorTextMoney
{
    protected function doClean($value)
    {
        return parent::doClean($value) / 100;
    }

}