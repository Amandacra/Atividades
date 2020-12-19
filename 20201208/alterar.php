<?php
header('Content-Type: application/json');
include "conexao.php";

if(!empty($_POST)){

    $tabela = $_POST["tabela"];
    $select = "SELECT * FROM $tabela";

    if(isset($_POST["cod"])){
        $codigo = $_POST['cod'];

        if($_POST["tabela"]=="pais"){
            $select .= " WHERE cod_pais = '$codigo'";
            $select .= " ORDER BY nome_pais";
        }
        else if($_POST["tabela"]=="estado"){
            $select .= " WHERE cod_estado = '$codigo'";
            $select .= " ORDER BY nome_estado";
        }
        else if($_POST["tabela"]=="cidade"){
            $select .= " WHERE cod_cidade = '$codigo'";
            $select .= " ORDER BY nome_cidade";
        }
        else if($_POST["tabela"]=="usuario"){
            $select .= " WHERE id_usuario = '$codigo'";
            $select .= " ORDER BY Nome";
        }
    }

    $resultado = mysqli_query($conexao,$select) or die(mysqli_error($conexao));
    while($linha = mysqli_fetch_assoc($resultado)){
        $matriz[]=$linha;
    }

    echo json_encode($matriz);

}else{
    $vetor["x"]="Deu ruim";
    echo json_encode($vetor);
}
?>