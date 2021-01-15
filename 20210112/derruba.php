<?php
	session_start();

  if(isset($_SESSION['tempo'])){
    $novo_tempo = date('i');

    if($novo_tempo > $_SESSION['tempo']){
      header('Location:logout.php');
    }else{
      header('Location: index.php');
    }

  }else{
    header('Location: index.php');
  }
?>
