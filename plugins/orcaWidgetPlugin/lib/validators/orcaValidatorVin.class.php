<?php

class orcaValidatorVin extends sfValidatorString
{
    protected static $transliteration = array(
        'A'=>1, 'B'=>2, 'C'=>3, 'D'=>4, 'E'=>5, 'F'=>6, 'G'=>7, 'H'=>8,
        'J'=>1, 'K'=>2, 'L'=>3, 'M'=>4, 'N'=>5, 'P'=>7, 'R'=>9,
        'S'=>2, 'T'=>3, 'U'=>4, 'V'=>5, 'W'=>6, 'X'=>7, 'Y'=>8, 'Z'=>9,
    );
 
    protected static $weights = array(8,7,6,5,4,3,2,10,0,9,8,7,6,5,4,3,2);
    
    protected function doClean($vin)
    {
        $vin = strtoupper($vin);
        $length = strlen($vin);
        $sum = 0;
 
        if($length != 17)
        {
            throw new sfValidatorError($this, 'invalid', array('value' => $vin, 'invalid' => 'Non valide'));
        }
// marche pas
//        for($x=0; $x<$length; $x++)
//        {
//            $char = substr($vin, $x, 1);
// 
//            if(is_numeric($char))
//            {
//                $sum += $char * self::$weights[$x];
//            }
//            else
//            {
//                if(!isset(self::$transliteration[$char]))
//                {
//                    throw new sfValidatorError($this, 'invalid', array('value' => $vin, 'invalid' => 'Non valide'));
//                }
// 
//                $sum += self::$transliteration[$char] * self::$weights[$x];
//            }
//        }
// 
//        $remainder = $sum % 11;
//        $checkdigit = $remainder == 10 ? 'X' : $remainder;
// 
//        if(substr($vin, 8, 1) != $checkdigit)
//        {
//            throw new sfValidatorError($this, 'invalid', array('value' => $vin, 'invalid' => 'Non valide'));
//        }
        
        return $vin;
    }

}
