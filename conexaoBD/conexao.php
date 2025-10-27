<?php

    $hostname = "localhost";
    $bancodedados = "site1";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname,$usuario,$senha, $bancodedados);

    if ($mysqli->connect_errno) {
        echo"falha na conexão: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;

    }