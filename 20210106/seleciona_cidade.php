<?php
header('Content-Type: application/json');
include "conexao.php";

$query="SELECT cod_cidade, nome_cidade, nome_estado, nome_pais FROM cidade INNER JOIN estado ON cidade_estado = cod_estado INNER JOIN pais 
    ON cidade_pais = cod_pais;";
$resultado = mysqli_query($conexao, $query) or die($conexao);

while($linha = mysqli_fetch_assoc($resultado)){
    $matriz[]=$linha;
}

echo json_encode($matriz);
?>