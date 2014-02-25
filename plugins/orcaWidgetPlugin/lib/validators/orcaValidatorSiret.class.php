<?php

class orcaValidatorSiret extends sfValidatorString
{

    protected function doClean($value)
    {
        $value = parent::doClean($value);

        if (strlen($value) != 14)       // le SIRET doit contenir 14 caractères
            throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => 'Non valide'));

        if (!is_numeric($value))       // le SIRET ne doit contenir que des chiffres
            throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => 'Non valide'));

        // on prend chaque chiffre un par un
        // si son index (position dans la chaîne en commence à 0 au premier caractère) est pair
        // on double sa valeur et si cette dernière est supérieure à 9, on lui retranche 9
        // on ajoute cette valeur à la somme totale
        $sum = 0;
        for ($i = 0; $i < 14; $i++)
        {
            if ($i % 2 == 0)
            {
                $tmp = $value[$i] * 2;
                $tmp = $tmp > 9 ? $tmp - 9 : $tmp;
            }
            else
            {
                $tmp = $value[$i];
            }
            $sum += $tmp;
        }
        if ($sum % 10 !== 0)
        {
            throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => 'Non valide'));
        }

        return $value;
    }

}
