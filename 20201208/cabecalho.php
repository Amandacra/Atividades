<?php

function cabecalho(){
    session_start();
    $alt = $GLOBALS["alt"];
    $menu = $GLOBALS["menu"];
    echo "
<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8' />
            <script src='js/jquery-3.5.1.min.js'></script>
            <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' />            
            <link href='css/main.css' rel='stylesheet' />            
            <script src='bootstrap/js/bootstrap.min.js'></script>
            <script src='js/md5.js'></script>
        </head>

        <body>                
            <nav class='navbar navbar-expand-md bg-dark navbar-dark'>
                <a href='index.php' class='navbar-brand logotipo'>
                    <img src='img/logo.png' class='rounded' alt='$alt' />
                </a>

                <!-- botão que aparece quando a tela for pequena -->
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#menu'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <div class='collapse navbar-collapse' id='menu'>
                    <ul class='navbar-nav'>
    ";
                    //se houver alguém logado
                    if(isset($_SESSION["usuario"])){

                        //se for admin
                        if($_SESSION["permissao"]=="1"){
                            echo "
                                <li role='presentation' class='dropdown'>
                                
                                    <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                                        Cadastrar <span class='caret'></span>
                                    </a>

                                    <ul class='dropdown-menu'>
                            ";       
                                foreach($menu as $i=>$l){
                                    echo "
                                        <li class='nav-item'>
                                            <a class='menu' href='form_$i.php'>$l</a>
                                        </li>
                                    ";
                                }  

                            echo "
                                        <li class='nav-item'>
                                            <a class='menu' href='form_usuario.php'>Usuario</a>
                                        </li>
                                    </ul>
                                </li>
                            ";
                            //se for usuario comum
                        }
                        //aparece para todos os logados, independentemente de quem seja
                        echo "
                            <li role='presentation' class='dropdown'>

                                <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                                    Listar <span class='caret'></span>
                                </a>

                                <ul class='dropdown-menu'>
                        ";                        
                            foreach($menu as $i=>$l){
                                echo "
                                    <li class='nav-item'>
                                        <a class='menu' href='lista_$i.php'>$l</a>
                                    </li>
                                ";
                            }  
                        echo "
                                    <li class='nav-item'>
                                        <a class='menu' href='lista_usuario.php'>Dados cadastrais</a>
                                    </li>
                                </ul>
                            </li>
                            
                        ";

                        echo "
                                <li>
                                    <ul class='navbar-nav'>
                                        <li role='presentation'>
                                            <a href='logout.php'>
                                                Logout 
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                        ";                        
                        //se não houver ninguém logado
                    }else{
                        echo "
                        <li>
                            <li role='presentation'>
                                <li class='nav-item'>
                                    <a class='menu' href='form_usuario.php'>Cadastrar-se</a>
                                </li>
                            </li>

                            <ul class='navbar-nav'>
                                <li role='presentation'>
                                    <a href='#' data-toggle='modal' data-target='#modal_login'>
                                        Login
                                    </a>
                                </li>
                            </ul>
                        </li>
                        ";
                    }
                        
                    echo "                        
                    </ul>  
                </div>        
            </nav>
        <main role='main' class='container'>
        ";
        //se a autenticação deu erro
        if(isset($_GET["erro"])){
            $erro = $_GET["erro"];
            
            if($erro==1){
                echo "
                    <div class='alert alert-danger' role='alert'>
                        E-mail inválido!
                    </div>
                ";
            }else{
                echo "
                    <div class='alert alert-danger' role='alert'>
                        Senha inválida!
                    </div>
                ";
            }
        }

        include "modal_login.php";
}
?>