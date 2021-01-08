<?php
    include "conexao.php";

    session_start();

    if(!empty($_POST)){
        //echo "Entrou";
        $tabela = $_POST["tabela"];

        if($tabela == "pais"){
            $cod = $_POST["cod"];
            $nome = $_POST["nome"];
    
            $update = "UPDATE pais SET 
                        nome_pais = '$nome' WHERE 
                        cod_pais = '$cod'";

        }else if($tabela == "estado"){
            $cod = $_POST["cod"];
            $nome = $_POST["nome"];
            $sigla = $_POST["sigla"];
            $pais = $_POST["pais"];

            $update = "UPDATE estado SET 
                        nome_estado = '$nome', 
                        sigla = '$sigla', 
                        pais_estado = '$pais' WHERE 
                        cod_estado = '$cod'";

        }else if($tabela == "cidade"){
            $cod = $_SESSION["usuario"];
            $nome = $_POST["nome"];
            $estado = $_POST["estado"];
            $pais = $_POST["pais"];

            $update = "UPDATE cidade SET 
                        nome_cidade = '$nome', 
                        cidade_estado = '$estado', 
                        cidade_pais = '$pais' WHERE 
                        cod_cidade = '$cod'";

        }else if($tabela == "usuario"){
            $cod = $_POST["cod"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha_cadastro"];
    
            $update = "UPDATE usuario SET 
                        email = '$email', 
                        Nome = '$nome'";
            
            if($senha!=""){
                $update.="                 , senha='$senha'";
            }
            
            $update.="               WHERE id_usuario = '$cod'";
        }

        mysqli_query($conexao,$update) or die(mysqli_error($update));

        echo "1";
    }else{
        header("Location: index.php");
    }
?>