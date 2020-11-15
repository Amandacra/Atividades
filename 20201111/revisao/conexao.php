<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "mapa";

    if(!$conexao = mysqli_connect($host, $usuario, $senha, $bd)){
        echo "Conexão com Banco de dados falhou";
    }
?>
