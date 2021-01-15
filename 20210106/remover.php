<?php
    session_start();

    include "conexao.php";

    if(!empty($_POST) && isset($_SESSION["usuario"]) && $_SESSION['permissao']=="1"){

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