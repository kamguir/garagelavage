<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrcaUtil
 *
 * @author bdujon
 */
class OrcaUtil {
    public static function slug($str)
    {
        $str = mb_strtolower(trim($str));
        $str = preg_replace('/[^.a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
    }
    
    public static function convertDocxToPdf($pathDocx, $pathPdf, &$output, &$retourCommand)
    {
        $retourCommand = null;
        $output = null;
        exec('java -jar '.sfConfig::get('sf_lib_dir').'/vendor/jodconverter-core-3.0-beta-4/lib/jodconverter-core-3.0-beta-4.jar '.$pathDocx.' '.$pathPdf, $output, $retourCommand);
    }
    
    public static function generatePassword($length = 8)
    {
        $password = substr(base64_encode(sha1(rand().rand())), 0, $length);
        
        //remplacement des 0,1,o,l,i par des e...
        $password = str_replace(array('0', '1', 'o', 'O', 'l', 'L', 'i', 'I'), 'e', $password);
        
        return $password;
    }
}
?>
