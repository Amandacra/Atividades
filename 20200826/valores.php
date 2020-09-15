<?php
	$nomeArquivo = $_GET["nomeArquivo"];
	$texto = $_GET["texto"]; 
	$Negrito = $_GET["Negrito"]; 
	$Italico = $_GET["Italico"];
	$Sublinhado = $_GET["Sublinhado"];

	$arquivo = fopen(''.$nomeArquivo.'.html','w');

	$textoFinal = '<p style="font-weight: '.$Negrito.';font-style: '.$Italico.';text-decoration: '.$Sublinhado.';"> '.$texto.' </p>';
	fwrite($arquivo, $textoFinal);

	fclose($arquivo);

	echo 'true';
?>