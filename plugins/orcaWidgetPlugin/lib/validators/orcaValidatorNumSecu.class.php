<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of orcaValidatorTextMoney
 * src: http://www.developpez.net/forums/d677820/php/langage/regex/verification-numero-securite-sociale-resolu/
 * @author srathgeber
 */
class orcaValidatorNumSecu extends sfValidatorBase
{
    
    protected function configure($options = array(), $messages = array())
    {
      $this->addMessage('num_secu', '"%value%" is invalid.');

    }
    
    protected function doClean($value)
    {
    //Expression de base d'Antoun et SNAFU (http://www.developpez.net/forums/d677820/php/langage/regex/verification-numero-securite-sociale/#post3969560),
    //mais corigée par mes soins pour respecter plus scrupuleusement le format
    $regexp = '/^                                           # début de chaîne
(?<sexe>[12378])                                             # 1 et 7 pour les hommes ou 2 et 8 pour les femmes, 3 pour les transgenres
(?<annee>[0-9]{2})                                          # année de naissance
(?<mois>0[0-9]|1[012]|[23][0-9]|4[012]|[5-9][0-9])                                   # mois de naissance (si >= 20, c\'est que les informations sur l\'acte de naissance sont incomplètes. Il y a différents cas 20 <= NIR <= 30 || 31 <= NIR <= 42 || 50<= NIR <= 99)
(?<departement>2[AB]|0[1-9]|[1-9][0-9]) # 2A ou 2B pour la Corse... 96 utilisait à l\'époque pour l\'algérie, n\'est plus attribué, mais la conversion en 99 a été possible mais pas systématique)
(?<numcommune>00[1-9]|0[1-9][0-9]|[1-8][0-9]{2}|9[0-8][0-9]|990)                                     # numéro d\'ordre de la commune (attention car particuler pour hors métro  traité hors expression régulière)ou fin du numéro de département (971 à 978 et 98 pour les DOM-TOM) ou de pays, ...)
(?<numacte>00[1-9]|0[1-9][0-9]|[1-9][0-9]{2})               # numéro d\'ordre d\'acte de naissance dans le mois et la commune ou pays
(?<clef>0[1-9]|[1-8][0-9]|9[0-7])?                          # numéro de contrôle (facultatif)
$                                                           # fin de chaîne
/x';
    //références : http://fr.wikipedia.org/wiki/Num%C3%A9ro_de_s%C3%A9curit%C3%A9_sociale_en_France#Signification_des_chiffres_du_NIR
 
    if(!preg_match($regexp, $value, $match)){
        throw new sfValidatorError($this, 'num_secu', array('value' => $value));
    }
    /* attention à l'overflow de php :)
      i.e :
    $test = '1850760057018' ;
    $clef = 97 - (substr($test, 0, 13) % 97) ;
    // => clef = 32 car l'opérande "%" travaille avec des entiers, et sur une archi 32 bits, 1850760057018 est transformé en 2147483647 ^_^
    $clef = 97 - fmod(substr($test, 0, 13), 97) ;
    // => clef = 18 (la valeur correcte, car fmod travaille avec des flottants)
     */
 
    $return = array(
        'sexe' => $match['sexe'],//7,8 => homme et femme ayant un num de sécu temporaire
        'annee' =>$match['annee'],//année de naissance + ou - un siècle uhuh
        'mois' =>$match['mois'],//20 = inconnu
        'departement' =>$match['departement'],//99 = étranger
        'numcommune' =>$match['numcommune'],//990 = inconnu
        'numacte' =>$match['numacte'],//001 à 999
        'clef' =>isset($match['clef'])?$match['clef']:NULL,//00 à 97
        'pays' =>'fra',//par défaut, on change que pour le cas spécifique
    );
 
    //base du calcul par défaut pour la clef (est modifié pour la corse)
    $aChecker = floatval(substr($value, 0, 13));
 
    /*Traitement des cas des personnes nées hors métropole ou en corse*/
    switch(true){
        //départements corses. Le calcul de la cles est différent
        case $return['departement'] == '2A' :
            $aChecker = floatval(str_replace('A', 0, substr($value, 0, 13)));
            $aChecker-= 1000000 ;
        break;
        case $return['departement'] == '2B' :
            $aChecker = floatval(str_replace('B', 0, substr($value, 0, 13)));
            $aChecker-= 2000000 ;
        break;
 
        case $return['departement'] == 97 || $return['departement'] == 98 :
            $return['departement'].=substr($return['numcommune'], 0, 1);
            $return['numcommune'] = substr($return['numcommune'], 1, 2) ;
            if($return['numcommune'] > 90){//90 = commune inconnue
                throw new sfValidatorError($this, 'num_secu', array('value' => $value, 'max_length' => $this->getOption('max_length')));
            }
        break;
 
        case $return['departement'] == 99 :
            $return['pays'] = $match['numcommune'] ;
            if($return['numcommune'] > 990){//990 = pays inconnu
                throw new sfValidatorError($this, 'num_secu', array('value' => $value));
            }
        break;
 
        default :
            if($return['numcommune'] > 990){//990 = commune inconnue
                throw new sfValidatorError($this, 'num_secu', array('value' => $value));
            }
        break;
    }
 
    $clef = 97 - fmod($aChecker, 97) ;
    if(empty($return['clef'])){
    {
       $return['clef'] = $clef ; //la clef est optionnelle, si elle n'est pas spécifiée, le numéro est valide, mais on rajoute la clef
       $value.$clef;
    }
       
    }if($clef != $return['clef']){
        throw new sfValidatorError($this, 'num_secu', array('value' => $value));
    }
 
    return $value ;
        
    }
    

}
