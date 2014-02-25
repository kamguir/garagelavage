<?php



class orcaValidatorSiren extends sfValidatorString
{
    protected function doClean($value)
    {
        $value = parent::doClean($value);

        if (strlen($value) != 9)       // le SIRET doit contenir 9 caractères
            throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => 'Non valide'));

        if (! is_numeric($value))       // le SIRET ne doit contenir que des chiffres
            throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => 'Non valide'));


        # // on prend chaque chiffre un par un
        # // si son index (position dans la chaîne en commence à 0 au premier caractère) est impair
        # // on double sa valeur et si cette dernière est supérieure à 9, on lui retranche 9
        # // on ajoute cette valeur à la somme totale
        #
        $sum = 0;
         for ($index = 0; $index < 9; $index ++)
         {
             $number = (int) $value[$index];
             if (($index % 2) != 0) { if (($number *= 2) > 9) $number -= 9; }
             $sum += $number;
         }


         // le numéro est valide si la somme des chiffres est multiple de 10
         if (($sum % 10) != 0)
            throw new sfValidatorError($this, 'invalid', array('value' => $value, 'invalid' => 'Non valide'));

         return $value;
    }


}

