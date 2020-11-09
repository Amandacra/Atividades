<?php
include "conf.php";

cabecalho();

echo '
    <div class = "container">
        <div class="row text-center">
            <div class="col">
                <h3>Lista de Países</h3>
            </div>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">País</th>
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