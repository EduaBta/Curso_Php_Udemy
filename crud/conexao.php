<?php

$hostname = "localhost";
$bancodedados = "crud_clientes";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

if ($mysqli->connect_errno) {
    die("Falha na conexão com o banco de dados");
}