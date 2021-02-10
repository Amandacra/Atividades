<!DOCTYPE html>
<html lang="pt-BR">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8" />
		<title>Tabela de cookies</title>
		<link rel="stylesheet" href="css/estilos.css" type="text/css" />
		<script src="js/jquery-3.5.1.min.js"></script>
    <style>
      table{
        text-align: center;
      }
      td,th{
        padding: 30px;
        box-shadow: 1px 1px 1px 1px black;
      }
			button{
				padding:10px;
				padding-left: 30px;
				padding-right: 30px;
				background-color: red;
			}
    </style>

	</head>

	<body>
		<h1>Tabela de cookies</h1>

    <table>
      <tr>
        <th>Nome</th>
        <th>Valor</th>
        <th>Ação</th>
      </tr>
	      <?php
					include "const_cookie.php";
	        echo isset($_COOKIE[NOME_COOKIE])?"
						<tr id='dados'>
							<td>".NOME_COOKIE."</td>
							<td>".base64_decode($_COOKIE[NOME_COOKIE])."</td>
							<td><input type='checkbox' name='del' value='sim' class='del'/></td>
		      	</tr>
						<tr id='dados2'>
							<td colspan='3'><button class='deletar'>Deletar</button></td>
						</tr>":"
						<tr>
							<td colspan='3'>Não há cookies</td>
						</tr>";
	      ?>
    </table>

    <p><a href='index.php'>Voltar</a></p>
    <p><a href='logout.php'>Sair</a></p>

    <script src="js/MD5.js"></script>
		<script src="js/login.js"></script>
		<noscript>Seu navegador não suporta JavaScript</noscript>
		<script>
			$(".deletar").click(function(){
				console.log("Entrou");
				if($(".del").is(":checked")){
					$.post("gravar_cookie.php",function(){
						document.getElementById("dados").style.display = "none";
						document.getElementById("dados2").style.display = "none";
					});
				}
			});
		</script>
	</body>

</html>
