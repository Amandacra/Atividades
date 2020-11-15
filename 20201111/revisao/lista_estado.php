<?php
include "conf.php";

cabecalho();
include "script_remover.php";

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
            <tbody>
    ';

    include "conexao.php";

    $query="SELECT * FROM estado;";
    $resultado = mysqli_query($conexao, $query) or die($conexao);

    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["cod_estado"].'</th>
                        <td>'.$linha["nome_estado"].'</td>
                        <td>'.$linha["sigla"].'</td>
                        <td>'.$linha["pais_estado"].'</td>
                        <td><button class="btn btn-danger remover_estado" value="'.$linha["cod_estado"].'">Remover</button></td>
                    </tr>
        ';
    }

    echo '
                </tbody>
            </table>
        </div>
    ';
}else{
    include "conexao.php";

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
                </tr>
            </thead>
            <tbody>
    ';

    $paisEstado = $_POST["paisEstado"];

    $query = "SELECT * FROM estado WHERE $paisEstado = pais_estado";
    $resultado = mysqli_query($conexao, $query) or die($conexao);
    
    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["cod_estado"].'</th>
                        <td>'.$linha["nome_estado"].'</td>
                        <td>'.$linha["sigla"].'</td>
                        <td>'.$linha["pais_estado"].'</td>
                    </tr>
        ';
    }

    echo '
                </tbody>
            </table>
        </div>
    ';
}

rodape();

?>