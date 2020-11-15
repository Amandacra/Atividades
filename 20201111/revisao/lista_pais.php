<?php
include "conf.php";

cabecalho();
include "script_remover.php";
echo '
    <div class = "container">
        <div class="row text-center">
            <div class="col">
                <h3>Lista de Países</h3>
            </div>
        </div>
        <div class="row">
            <div class="col alerta">
            </div>
        </div>
        
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">País</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
';

include "conexao.php";

$query="SELECT * FROM pais;";
$resultado = mysqli_query($conexao, $query) or die($conexao);

while($linha=mysqli_fetch_assoc($resultado)){
    echo '
                <tr>
                    <th scope="row">'.$linha["cod_pais"].'</th>
                    <td>'.$linha["nome_pais"].'</td>
                    <td><button class="btn btn-danger remover_pais" value="'.$linha["cod_pais"].'">Remover</button></td>
                </tr>
    ';
}

echo '
            </tbody>
        </table>
    </container>
';

rodape();

?>