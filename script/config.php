<?php 

    $dbHost     = 'Localhost'; //maquina local
    $dbUsername = 'root'; //nome de usuario
    $dbPassword = ''; //vazio pois não possui senha
    $dbName     = 'transacoes'; //nome do banco de dados

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); //conexão com o banco

?>