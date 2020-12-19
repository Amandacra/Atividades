<?php
include "conf.php";

cabecalho();

echo "<div>Bem vindo";

if(isset($_SESSION["usuario"])){
    echo " ".$_SESSION["nome_usuario"];
}

echo "! Neste site você poderá cadastrar países, estados e cidades e consulta-los a partir das listas.</div>";

rodape();

?>