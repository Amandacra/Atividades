<?php
    include "conexao.php";

    if(!empty($_POST)){
        $tabela = $_POST["tabela"];
        $coluna = $_POST["coluna"];
        $cod = $_POST["cod"];

        $delete = "DELETE FROM $tabela WHERE $coluna = '$cod'";
        mysqli_query($conexao, $delete) or die($delete);

        echo "true";
    }else{
        header("Location: index.php");
    }
?>