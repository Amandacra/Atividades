<?php
include "conf.php";
include "conexao.php";

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
                            <h3>Cadastro de Cidades</h3>
                        </div>
                    </div>
            
                    <form action="form_cidade.php" method="POST">
                        <div class="row">
                            <div class="col-2">
                                Nome da cidade:
                            </div>
                            <div class="col-5">
                                <input type="text" name="nome" class="form-control" max="100" placeholder="Nome" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Estados:
                            </div>
                            <div class="col">
                                <select id="inputEstado" class="form-control" name="cidadeEstado" required>
                                    <option value="">Selecione um estado</option>
            ';
        
            $select="SELECT cod_estado, nome_estado FROM estado";
            $resultado = mysqli_query($conexao, $select) or die($conexao);
        
            while($linha = mysqli_fetch_assoc($resultado)){
                echo '<option value="'.$linha["cod_estado"].'">'.$linha["nome_estado"].'</option>';
            }
        
            echo '
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                País:
                            </div>
                            <div class="col">
                                <select id="inputPais" class="form-control" name="cidadePais" required>
                                    <option value="">Selecione um país</option>
            ';
        
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
        
            $nomeCidade = $_POST["nome"];
            $cidadeEstado = $_POST["cidadeEstado"];
            $cidadePais = $_POST["cidadePais"];
        
            $query = "INSERT INTO cidade(nome_cidade, cidade_estado, cidade_pais) VALUES('$nomeCidade', '$cidadeEstado', '$cidadePais')";
        
            mysqli_query($conexao, $query) or die($query);
        
            echo "<div class='alert alert-success' role='alert'>
                    Cidade cadastrada com sucesso!
                </div>
            ";
        
        }
    }
}else{
    header("Location: index.php");
}


rodape();

?>