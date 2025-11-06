<?php 
//inclui a pagina, se dar erro mostra o erro e continua 
include("teste.php");
//inclui a pagina mas se der erro ela não continua
require("teste.php");
//inclui somente uma vez, faz a verificação ou seja não duplica
require_once("teste.php");

echo $numero*3;