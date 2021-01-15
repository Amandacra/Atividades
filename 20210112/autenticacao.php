<?php
	session_start();

    if(!empty($_POST)) {

			include "conexao.php";

        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT cpf, nome, nivel, descricao FROM usuario as u INNER JOIN perfil as p ON u.id_perfil = p.nivel_permissao INNER JOIN permissao as pe ON p.nivel_permissao = pe.nivel WHERE email=? AND senha=?";

				/*Essa função pode retornar a referencia para o comando preparado, ou seja o statement, que é um comando sql
				compilado no banco ou se der errado ela retorna false*/
				if($stmt = mysqli_prepare($conexao, $sql)){
						//Se tudo der certo ela retorna true ou false
						mysqli_stmt_bind_param($stmt, "ss", $email, $senha);

						mysqli_stmt_execute($stmt);

						//Pode retornar os valores ou false
						//Essa função só se aplica a função do tipo select
						$resultado = mysqli_stmt_get_result($stmt);

						if(mysqli_num_rows($resultado) == 1) {

		            $linha = mysqli_fetch_assoc($resultado);

		            $_SESSION["cpf"] = $linha["cpf"];
		            $_SESSION["tipo"] = $linha["nome"];
		            $_SESSION["nivel"] = $linha["nivel"];
		            $_SESSION["descricao"] = $linha["descricao"];
								$_SESSION["email"] = $email;
								$_SESSION["senha"] = $senha;

		            header("location: index.php");
						}else{
								header("location: erro.html");
						}

						//fecha o statement
						mysqli_stmt_close($stmt);
				}else{
					echo "Houve um problema durante a preparação do comando SQL:".mysqli_error($conexao);
				}
        //$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
				//fecha a conexão
				mysqli_stmt_close($conexao);
    }else{
				header("location: index.php");
		}

?>
