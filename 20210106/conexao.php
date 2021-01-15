<?php
    $host = "db4free.net:3306";
    $usuario = "amanda_ancelmo";
    $senha = "123456789";
    $bd = "mapa_amanda";

    if(!$conexao = mysqli_connect($host, $usuario, $senha, $bd)){
        echo "Conexão com Banco de dados falhou";
    }
?>