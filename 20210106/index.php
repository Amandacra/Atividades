<?php
include "conf.php";

cabecalho();

echo "<div><h1>Bem vindo";

if(isset($_SESSION["usuario"])){
    echo " ".$_SESSION["nome_usuario"];
}

echo "!</h1></br> Neste site você poderá cadastrar países, estados e cidades e consulta-los a partir das listas.</div>";

rodape();
?>