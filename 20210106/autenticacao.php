<?php
    session_start();

    if(!empty($_POST)){
        include "conexao.php";
        
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $query = "SELECT id_usuario, Nome, permissao 
                    FROM usuario WHERE email=? AND senha=?";

        $stmt = mysqli_prepare($conexao, $query);

        //bind parameters for markers
        mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

        //execute query
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($resultado)=="1"){
            $linha = mysqli_fetch_assoc($resultado);
            $_SESSION["usuario"]=$linha['id_usuario'];
            $_SESSION["nome_usuario"]=$linha['Nome'];
            $_SESSION["permissao"]=$linha['permissao'];
            header("Location: index.php");
        }else{
            header("Location: index.php?erro=2");
        }
    }else{
        header("Location: index.php");
    }
?>