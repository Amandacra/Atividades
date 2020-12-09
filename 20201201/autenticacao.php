<?php
    session_start();

    if(!empty($_POST)){
        include "conexao.php";
        
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $query = "SELECT id_usuario FROM usuario WHERE email='$email' AND senha='$senha'";
        $resultado = mysqli_query($conexao,$query) or die(mysqli_query($query));
        
        if(mysqli_num_rows($resultado)=="1"){
            $linha = mysqli_fetch_assoc($resultado);
            $_SESSION["usuario"]=$linha['id_usuario'];
            header("Location: index.php");
        }else{
            header("Location: index.php?erro=2");
        }
    }


    /*if(!empty($_POST)){
        include "conexao.php";
        //recupero os dados
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        //recupera do banco um email que seja igual ao digitado
        $query = "SELECT id_usuario FROM usuario WHERE email='$email'";
        $resultado = mysqli_query($conexao,$query) or die(mysqli_query($query));
        
        //se houver um email igual o id é atribuido a uma variável
        if(mysqli_num_rows($resultado)=="1"){
            while($linha = mysqli_fetch_assoc($resultado)){
                $id_usuario=$linha;
            }

            //recupera do banco se a senha do id for igual a digitada 
            $query1 = "SELECT id_usuario FROM usuario WHERE id_usuario='$id_usuario' AND senha='$senha";
            $resultado = mysqli_query($conexao,$query1) or die(mysqli_query($query1));

            //se sim o login deu certo
            if(mysqli_num_rows($resultado)=="1"){
                $linha = mysqli_fetch_assoc($resultado);
                $_SESSION["usuario"]=$linha['id_usuario'];
                header("Location: index.php");
            }else{
                header("Location: index.php?erro=2");
            }

        }else{
            header("Location: index.php?erro=1");
        }
    }*/
?>