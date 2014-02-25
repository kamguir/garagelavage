<?php

/**
 * source : http://fr.wikipedia.org/wiki/ISO_13616#Algorithme_de_v.C3.A9rification_en_PHP_avec_REGEX
 */
class orcaValidatorIban extends sfValidatorString
{
    protected function doClean($s_IBAN)
    {
        if(empty($s_IBAN)) 
            return $s_IBAN;
 
        // Nettoyage des caractères de formatage et mise en Capital
        $s_IBAN = strtoupper(trim($s_IBAN));
        /* Vérification de l'IBAN par rapport au modèle :
                - Ne comporte pas ' espace , . / - ? : ( ) , " +
                - Suppression des caractères IBAN en début de phrase si présent
                - Déplacement des 4 premiers caractères (2 lettres et 2 chiffres) à la fin de la chaîne
                - Remplacement des caractères alphabétiques comme suit : A->10, B->11 C->12... Z->35
                - Vérifie que le modulo 97 donne 1
        */
        $s_modele = array('/[\'\s\/\-\?:\(\)\.,"\+]/', '/^IBAN(.+)/', '/([[:alpha:]]{2}[[:digit:]]{2})([[:alnum:]]+)/', "/([A-Z])/e");
        $s_retour = array('', '\1', '\2\1', "ord('\\1')-55");
        $i_IBAN = preg_replace($s_modele, $s_retour, $s_IBAN);
        if(bcmod($i_IBAN, 97) != 1)
           throw new sfValidatorError($this, 'invalid', array('value' => $s_IBAN, 'invalid' => 'Non valide'));
        return $s_IBAN;
    }

}
