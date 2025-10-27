<?php
#função para elevar um número usando for
function elevado($num, $elevado) {
    $resu = 1; // Começa com 1, pois qualquer número elevado a 0 é 1
    for ($k = 0; $k < $elevado; $k++) {
        $resu *= $num;
    }
    return $resu;
}

$var = elevado(2, 6);
print_r($var); 

