<?php
    session_start();

    if(isset($_GET["fruta"])){
        if($_GET["fruta"]==""){
            echo "Digite uma fruta no campo!";
        }else if(in_array($_GET["fruta"], $_SESSION["cadastrar"])){
            echo "Fruta já cadastrada!";
        }else{
            $_SESSION["cadastrar"][]=$_GET["fruta"];
            $cont=0;
            foreach($_SESSION["cadastrar"] as $valor){
                $cont++;
            }
            
            if($cont>1){
                echo 'Nova fruta cadastrada';
            }
        }
    }
?>