<?php
include "conf.php";
cabecalho();
include "scripts.php";
include "conexao.php";

if(isset($_SESSION["usuario"])){
    if(empty($_POST)){
        echo '
            <div class = "container">
                <div class="row text-center">
                    <div class="col">
                        <h3>Lista de Cidades</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col alerta">
                    </div>
                </div>
        
                <form action="lista_cidade.php" method="POST">
                    <div class="row">
                        <div class="col-2">
                            Filtrar por estado:
                        </div>
                        <div class="col">
                            <select id="inputEstado" class="form-control" name="cidadeEstado">
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
                            Filtrar por país:
                        </div>
                        <div class="col">
                            <select id="inputEstado" class="form-control" name="paisEstado">
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
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                        <div class="col">
                            <a type="button" href="lista_cidade.php" class="btn btn-secondary">Limpar filtro</a>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">País</th>
        ';
        

        if($_SESSION["permissao"]=="1"){
            echo '
                        <th scope="col">Ação</th>
            ';
        }

        echo '
                    </tr>
                </thead>
                <tbody class="tbody">
        ';

        $query="SELECT cod_cidade, nome_cidade, nome_estado, nome_pais FROM cidade INNER JOIN estado ON cidade_estado = cod_estado 
            INNER JOIN pais ON cidade_pais = cod_pais;";
        $resultado = mysqli_query($conexao, $query) or die($conexao);

        $i=0;
        while($linha=mysqli_fetch_assoc($resultado)){
            echo '
                        <tr>
                            <th scope="row">'.$linha["cod_cidade"].'</th>
                            <td>'.$linha["nome_cidade"].'</td>
                            <td>'.$linha["nome_estado"].'</td>
                            <td>'.$linha["nome_pais"].'</td>
            ';

            if($_SESSION["permissao"]=="1"){
                echo '
                            <td>
                                <button class="btn btn-warning alterar_cidade" value="'.$linha["cod_cidade"].'" data-toggle="modal" 
                                    data-target="#modalAlterar">Alterar</button>
                                <button class="btn btn-danger remover_cidade" value="'.$linha["cod_cidade"].'">Remover</button>
                            </td>
                ';
            }
            
            echo '
                        </tr>
            ';

            $i++;
        }

        if($i==0){
            echo "
                <tr>
                    <td colspan='5' class='text-center'>Não há cidades cadastradas ainda</td>
                </tr>
            ";
        }

        echo '
                    </tbody>
                </table>
            </div>
        ';
    }else{

        echo '
            <div class = "container">
                <div class="row text-center">
                    <div class="col">
                        <h3>Lista de Cidades</h3>
                    </div>
                </div>
                <form action="lista_cidade.php" method="POST">
                <div class="row">
                    <div class="col-2">
                        Filtrar por estado:
                    </div>
                    <div class="col">
                        <select id="inputEstado" class="form-control" name="cidadeEstado">
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
                            Filtrar por país:
                        </div>
                        <div class="col">
                            <select id="inputEstado" class="form-control" name="paisEstado">
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
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                        <div class="col">
                            <a type="button" href="lista_cidade.php" class="btn btn-secondary">Limpar filtro</a>
                        </div>
                    </div>
                </form>
            </div>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">País</th>
        ';
                             
        if($_SESSION["permissao"]=="1"){
            echo '
                        <th scope="col">Ação</th>
            ';
        }

        echo '
                    </tr>
                </thead>
                <tbody class="tbody">
        ';

        if(empty($_POST["cidadeEstado"])){
            $query="SELECT cod_cidade, nome_cidade, nome_estado, nome_pais FROM cidade INNER JOIN estado ON cidade_estado = cod_estado 
                INNER JOIN pais ON cidade_pais = cod_pais WHERE ".$_POST['paisEstado']." = cidade_pais;";
        }else{
            $query="SELECT cod_cidade, nome_cidade, nome_estado, nome_pais FROM cidade INNER JOIN estado ON cidade_estado = cod_estado 
                INNER JOIN pais ON cidade_pais = cod_pais WHERE ".$_POST['cidadeEstado']." = cidade_estado;";
        }
        $resultado = mysqli_query($conexao, $query) or die($conexao);

        $i=0;
        while($linha=mysqli_fetch_assoc($resultado)){
            echo '
                        <tr>
                            <th scope="row">'.$linha["cod_cidade"].'</th>
                            <td>'.$linha["nome_cidade"].'</td>
                            <td>'.$linha["nome_estado"].'</td>
                            <td>'.$linha["nome_pais"].'</td>
            ';
                
            if($_SESSION["permissao"]=="1"){
                echo '
                            <td>
                                <button class="btn btn-warning alterar_cidade" value="'.$linha["cod_cidade"].'" data-toggle="modal" 
                                    data-target="#modalAlterar">Alterar</button>
                                <button class="btn btn-danger remover_cidade" value="'.$linha["cod_cidade"].'">Remover</button>
                            </td>
                ';
            }
            
            echo '
                        </tr>
            ';

            $i++;
        }

        if($i==0){
            echo "
                <tr>
                    <td colspan='5' class='text-center'>Não há cidades cadastradas ainda</td>
                </tr>
            ";
        }

        echo '
                    </tbody>
                </table>
            </div>
        ';
    }
}else{
    echo "
        <script>location.href='index.php'</script>
    ";
}

$titulo = "Alterar Cidade";
$nome_form = "cidade";

include "forms_alterar.php";
include "modal.php";

rodape();

?>