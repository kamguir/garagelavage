<?php

function getTableauObjectifFixe($mesValeurs) {
    $tablMois = array('01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0,
        '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0);

    foreach ($tablMois as $keyMois => $valueMois) {
        foreach ($mesValeurs as $key => $value) {
            if (FALSE !== strpos($value->getObjectifDate(), date('Y') . '-' . $keyMois)) {

                $tablMois[$keyMois] = $value->getObjectifFixe();
            }
        }
    }
    return $tablMois;
}

function getTableauObjectifRealise($mesValeurs) {
    $tablMois = array('01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0,
        '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0);

    foreach ($tablMois as $keyMois => $valueMois) {
        foreach ($mesValeurs as $key => $value) {
            if (FALSE !== strpos($value->getObjectifDate(), date('Y') . '-' . $keyMois)) {
                $tablMois[$keyMois] = $value->getObjectifRealise();
            }
        }
    }
    return $tablMois;
}

function getNbrVoiture($idMarque) {
    return $idMarques = TblVoitureQuery::create()
            ->filterByIdMarque($idMarque)
            ->count();
}

function getMontantDepenses($mois) {
    $annee = date('Y');

    $jourCourant = 'DAY(' . TblDepensesPeer::DATE_DEPENSES . ')between 1 and 31';
    $moisCourant = 'MONTH(' . TblDepensesPeer::DATE_DEPENSES . ')=' . $mois;
    $anneeCourante = 'YEAR(' . TblDepensesPeer::DATE_DEPENSES . ')=' . $annee;

    return (double) TblDepensesQuery::create()
                    ->addAnd(TblDepensesPeer::DATE_DEPENSES, $jourCourant, Criteria::CUSTOM)
                    ->addAnd(TblDepensesPeer::DATE_DEPENSES, $moisCourant, Criteria::CUSTOM)
                    ->addAnd(TblDepensesPeer::DATE_DEPENSES, $anneeCourante, Criteria::CUSTOM)
                    ->withColumn('SUM(' . TblDepensesPeer::MONTANT_DEPENSES . ')', "montantDepenses")
                    ->select('montantDepenses')
                    ->findOne();
}

function getMontantTotalParJour($jour = null) {
    return $montantTotal = TblVoitureQuery::create()
            ->count();
}

?>
