<?php
include "conf.php";
cabecalho();
include "scripts.php";
include "conexao.php";

if(isset($_SESSION["usuario"])){
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

    $query="SELECT * FROM pais;";
    $resultado = mysqli_query($conexao, $query) or die($conexao);

    $i=0;
    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["cod_pais"].'</th>
                        <td>'.$linha["nome_pais"].'</td>
        ';

        if($_SESSION["permissao"]=="1"){
            echo '
                        <td>   
                            <button class="btn btn-warning alterar_pais" value="'.$linha["cod_pais"].'" data-toggle="modal" 
                                data-target="#modalAlterar">Alterar</button>
                            <button class="btn btn-danger remover_pais" value="'.$linha["cod_pais"].'">Remover</button>
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
                <td colspan='3' class='text-center'>Não há países cadastrados ainda</td>
            </tr>
        ";
    }

    echo '
                </tbody>
            </table>
        </container>
    ';

    $titulo = "Alterar País";
    $nome_form = "pais";

    include "forms_alterar.php";
    include "modal.php";

}else{
    echo "
        <script>location.href='index.php'</script>
    ";
}
rodape();

?>