<?php
include "conf.php";

cabecalho();

if(empty($_POST)){
    echo '
        <div class = "container">
            <div class="row text-center">
                <div class="col">
                    <h3>Cadastro de Países</h3>
                </div>
            </div>
    
            <form action="form_pais.php" method="POST">
                <div class="row">
                    <div class="col-2">
                        Nome do país:
                    </div>
                    <div class="col">
                        <input type="text" name="nome" class="form-control" placeholder="Nome" max="100" required>
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

    $nomePais = $_POST["nome"];

    $query = "insert into pais(nome_pais) values('$nomePais')";

    mysqli_query($conexao, $query)
        or die($query);

    echo "<div class='alert alert-success' role='alert'>
            País cadastrado com sucesso!
        </div>
    ";
}

rodape();

?>