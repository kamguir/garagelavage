<?php

/**
 * 
 * @param type $tbl1
 * @param type $tbl2
 * @return 0 si tableau egeau
 *          -1 si tbl1 est supperieur tbl2
 * 
 */
function compar2tableaux($tbl1, $tbl2) {
    $tblInser = $tbl1;
    foreach ($tbl1 as $key1 => $value1) {
        if ($value1 < $tbl2[$key1]) {
            $tblInser[$key1] = 1;
        } elseif ($value1 > $tbl2[$key1]) {
            $tblInser[$key1] = -1;
        } else {
            $tblInser[$key1] = 0;
        }
    }
    return $tblInser;
}

function get_month_name($month) {
    $months = array(
        '01' => 'Janvier',
        '02' => 'Février',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Aôut',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    );
    return $months[$month];
}

?>
