<?php
# Função para imprimir 10 números
function gerarNumeros($inicio, $fim){
    if ($fim <= $inicio) {
        echo "Energumeno não coloca o número menor no final";
        return []; // Evita erro
    } else {
        $lista = [];
        for ($k = $inicio; $k <= $fim; $k++) {
            $lista[] = $k;
        }
    }
    return $lista;
}

$var = gerarNumeros(1, 5);
print_r($var);
echo "<br>";
echo implode(", ", $var);
