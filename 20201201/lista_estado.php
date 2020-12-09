<?php
include "conf.php";
cabecalho();
include "scripts.php";
include "conexao.php";

if(empty($_POST)){
    echo '
        <div class = "container">
            <div class="row text-center">
                <div class="col">
                    <h3>Lista de Estados</h3>
                </div>
            </div>
            <div class="row">
                <div class="col alerta">
                </div>
            </div>
    
            <form action="lista_estado.php" method="POST">
                <div class="row">
                    <div class="col-2">
                        Filtrar por país:
                    </div>
                    <div class="col">
                        <select id="inputEstado" class="form-control" name="paisEstado" required>
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
                        <a type="button" href="lista_estado.php" class="btn btn-secondary">Limpar filtro</a>
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">País</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody class="tbody">
    ';

    $query="SELECT cod_estado, nome_estado, sigla, nome_pais FROM estado INNER JOIN pais ON pais_estado = cod_pais;";
    $resultado = mysqli_query($conexao, $query) or die($conexao);

    $i=0;
    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["cod_estado"].'</th>
                        <td>'.$linha["nome_estado"].'</td>
                        <td>'.$linha["sigla"].'</td>
                        <td>'.$linha["nome_pais"].'</td>
                        <td>
                            <button class="btn btn-warning alterar_estado" value="'.$linha["cod_estado"].'" data-toggle="modal" 
                                data-target="#modalAlterar">Alterar</button>
                            <button class="btn btn-danger remover_estado" value="'.$linha["cod_estado"].'">Remover</button>
                        </td>
                    </tr>
        ';
        $i++;
    }

    if($i==0){
        echo "
            <tr>
                <td colspan='5' class='text-center'>Não há estados cadastrados ainda</td>
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
                    <h3>Lista de Estados</h3>
                </div>
            </div><form action="lista_estado.php" method="POST">
            <div class="row">
                <div class="col-2">
                    Filtrar por país:
                </div>
                <div class="col">
                    <select id="inputEstado" class="form-control" name="paisEstado" required>
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
                        <a type="button" href="lista_estado.php" class="btn btn-secondary">Limpar filtro</a>
                    </div>
                </div>
            </form>
        </div>
    ';
    echo '
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">País</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody class="tbody">
    ';

    $paisEstado = $_POST["paisEstado"];

    $query="SELECT cod_estado, nome_estado, sigla, nome_pais FROM estado INNER JOIN pais ON pais_estado = cod_pais WHERE cod_pais = $paisEstado;";
    $resultado = mysqli_query($conexao, $query) or die($conexao);
    
    $i=0;
    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["cod_estado"].'</th>
                        <td>'.$linha["nome_estado"].'</td>
                        <td>'.$linha["sigla"].'</td>
                        <td>'.$linha["nome_pais"].'</td>
                        <td>
                            <button class="btn btn-warning alterar_estado" value="'.$linha["cod_estado"].'" data-toggle="modal" 
                                data-target="#modalAlterar">Alterar</button>
                            <button class="btn btn-danger remover_estado" value="'.$linha["cod_estado"].'">Remover</button>
                        </td>
                    </tr>
        ';
        $i++;
    }

    if($i==0){
        echo "
            <tr>
                <td colspan='5' class='text-center'>Não há estados cadastrados ainda</td>
            </tr>
        ";
    }

    echo '
                </tbody>
            </table>
        </div>
    ';
}

$titulo = "Alterar Estado";
$nome_form = "estado";

include "forms_alterar.php";
include "modal.php";

rodape();

?>