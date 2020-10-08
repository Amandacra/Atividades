<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "escola";

                            //%% - traz todos os nomes que contenham essa string e não somente sendo o primeiro ou segundo nome
                            //% antes pega somente o sobrenome
                            //% depois pega somente o primeiro nome
    $conexao = mysqli_connect($host, $usuario, $senha, $bd);
    if(!$conexao){
        die( "Conexão com Banco de dados falhou");
    }
?>