<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div id="filtro">
        <b>Filtrar alunos por:</b></hr>
            <form method="POST" action="alunos.php">
                <p>
                    Sexo
                </p>
                <input type="radio" name="sexo" value="m"/>Masc.
                <input type="radio" name="sexo" value="f"/>Fem. 
                </br></br><hr/></br>

                <input type="text" name="nome" placeholder="Procurar por nome..."/>
                </br></br><hr/></br>

                <p>Nascidos a partir de: 
                <input type="date" name="data"/>
                </br></br><hr/></br>

                <button>Filtrar</button>
                </br></br><hr/></br>

                <?php
                    include "conexao.php";

                    $select = "SELECT * FROM aluno";

                    if(!empty($_POST)){
                        $select .= " WHERE (1=1)";
                        if(isset($_POST["sexo"])){
                            $sexo=$_POST["sexo"];
                            $select .= " AND sexo = '$sexo'";
                        }

                        if(isset($_POST["nome"])){
                            $nome = $_POST["nome"];
                            $select .= " AND  nome like '%$nome%'";
                        }

                        if(isset($_POST["data"])){
                            $data = $_POST["data"];
                            $select .= " AND  data_nascimento >= '$data'";
                        }
                    }

                    $select .= " ORDER BY nome";
                    echo $select ."</br>";
                    $resultado = mysqli_query($conexao, $select) 
                    OR die(mysqli_error($conexao));

                    while($linha=mysqli_fetch_assoc($resultado)){
                        echo "<b>Prontuário</b>:". $linha["prontuario"] ."<br/>";
                        echo "<b>Nome</b>:". $linha["nome"] ."<br/>";
                        echo "<b>E-mail</b>:". $linha["email"] ."<br/>";
                        echo "<b>Data de Nascimento</b>:". $linha["data_nascimento"] ."<br/>";
                        echo "<b>Sexo</b>:". $linha["sexo"] ."<br/></br>";
                        echo "<hr/>
                        </br>";
                    }
                ?>
            </form>
    </div>
</body>
</html>