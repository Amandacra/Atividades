<?php
include "conf.php";

cabecalho();

if(empty($_POST)){
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

    include "conexao.php";

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
                        <a type="button" href="lista_cidade.php" class="btn btn-secondary">Limpar filtro</a>
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
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">País</th>
                </tr>
            </thead>
            <tbody>
    ';

    include "conexao.php";

    $query="SELECT cod_cidade, nome_cidade, nome_estado, nome_pais FROM cidade INNER JOIN estado ON cidade_estado = cod_estado INNER JOIN pais ON cidade_pais = cod_pais;";
    $resultado = mysqli_query($conexao, $query) or die($conexao);

    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["cod_cidade"].'</th>
                        <td>'.$linha["nome_cidade"].'</td>
                        <td>'.$linha["nome_estado"].'</td>
                        <td>'.$linha["nome_pais"].'</td>
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

    include "conexao.php";

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
                        <a type="button" href="lista_cidade.php" class="btn btn-secondary">Limpar filtro</a>
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
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">País</th>
                </tr>
            </thead>
            <tbody>
    ';

    include "conexao.php";
    if(empty($_POST["cidadeEstado"])){
        $query="SELECT cod_cidade, nome_cidade, nome_estado, nome_pais FROM cidade INNER JOIN estado ON cidade_estado = cod_estado 
            INNER JOIN pais ON cidade_pais = cod_pais WHERE ".$_POST['paisEstado']." = cidade_pais;";
    }else{
        $query="SELECT cod_cidade, nome_cidade, nome_estado, nome_pais FROM cidade INNER JOIN estado ON cidade_estado = cod_estado 
            INNER JOIN pais ON cidade_pais = cod_pais WHERE ".$_POST['cidadeEstado']." = cidade_estado;";
    }
    $resultado = mysqli_query($conexao, $query) or die($conexao);

    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["cod_cidade"].'</th>
                        <td>'.$linha["nome_cidade"].'</td>
                        <td>'.$linha["nome_estado"].'</td>
                        <td>'.$linha["nome_pais"].'</td>
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