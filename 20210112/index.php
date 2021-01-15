<?php
	session_start();

	include "conteudo.php";

	if(isset($_SESSION["cpf"])){
		$tempo = date('i');
		$_SESSION['tempo']=$tempo;
		
		$titulo = "Entrada";
		$conteudos = array();
		$conteudos[0] = "<p>Olá, ".$_SESSION['email'].".</p>";
		$conteudos[1] = "<p>Seu tipo é ".$_SESSION['tipo'].".</p>";
		$conteudos[2] = "<p>Seu cpf é ".$_SESSION['cpf'].".</p>";
		$conteudos[3] = "<p>Seu nível de permissão é ".$_SESSION['nivel'].", que corresponde a ".$_SESSION['descricao'].".</p>";
		$conteudos[4] = "<p>Não se preocupe, sua senha é salva através de um método de criptografia que transforma sua senha em ".$_SESSION['senha']." ao fazer a autenticação.</p>";
		$conteudos[5] = "<p>Seja bem vindo ao sistema</p>";
		$conteudos[6] = "<p><a href='derruba.php'>Botão</a></p>";
		$conteudos[7] = "<p><a href='logout.php'>Sair</a></p>";
		exibir($titulo, $conteudos);
	}
	else {
		session_destroy();
		header("location: form_login.html");
	}
?>
