<?php
header('Content-Type: application/json');
include "conexao.php";

$query="SELECT cod_estado, nome_estado, sigla, nome_pais FROM estado INNER JOIN pais ON pais_estado = cod_pais;";
$resultado = mysqli_query($conexao, $query) or die($conexao);

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>