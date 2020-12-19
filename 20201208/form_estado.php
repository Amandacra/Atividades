<?php
include "conf.php";

cabecalho();

if(isset($_SESSION["usuario"])){
    if($_SESSION["permissao"]=="2"){
        echo "
            <script>location.href='index.php'</script>
        ";
    }else{
        if(empty($_POST)){
            echo '
                <div class = "container">
                    <div class="row text-center">
                        <div class="col">
                            <h3>Cadastro de Estados</h3>
                        </div>
                    </div>
            
                    <form action="form_estado.php" method="POST">
                        <div class="row">
                            <div class="col-2">
                                Nome do estado:
                            </div>
                            <div class="col-5">
                                <input type="text" name="nome" class="form-control" max="100" placeholder="Nome" required>
                            </div>
                            <div class="col-2">
                                Sigla do estado:
                            </div>
                            <div class="col-3">
                                <input type="text" name="sigla" max="3" class="form-control" placeholder="Sigla" max="2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                País:
                            </div>
                            <div class="col">
                                <select id="inputEstado" class="form-control" name="paisEstado" required>
                                    <option value="">Selecione um país</option>
            ';
            
            include "conexao.php";

            $select="SELECT * FROM pais";
            $resultado = mysqli_query($conexao, $select) or die($conexao);

            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<option value="'.$linha["cod_pais"].'">'.$linha["nome_pais"].'</option>';
            }

            echo '
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                            <div class="col">
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                            </div>
                        </div>
                    </form>
                </div>
            ';
        }else{
            include "conexao.php";

            $nomeEstado = $_POST["nome"];
            $paisEstado = $_POST["paisEstado"];

            if($_POST["sigla"]!=""){
                $sigla=$_POST["sigla"];
            }else{
                $sigla="";
            }

            $query = "INSERT INTO estado(nome_estado, sigla, pais_estado) VALUES('$nomeEstado', '$sigla', '$paisEstado')";

            mysqli_query($conexao, $query)
                or die($query);

            echo "<div class='alert alert-success' role='alert'>
                    Estado cadastrado com sucesso!
                </div>
            ";

        }
    }
}else{
    header("Location: index.php");
}

rodape();

?>