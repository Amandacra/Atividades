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
                    <h1>Dados cadastrais</h1>
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
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody class="tbody">
    ';

    if($_SESSION["permissao"]=="1"){
        $query="SELECT * FROM usuario ORDER BY id_usuario";
    }else if($_SESSION["permissao"]=="2"){
        $query = "SELECT  * FROM usuario WHERE id_usuario='".$_SESSION['usuario']."'";
    }
    
    $resultado = mysqli_query($conexao, $query) or die($conexao);

    $i=0;
    while($linha=mysqli_fetch_assoc($resultado)){
        echo '
                    <tr>
                        <th scope="row">'.$linha["id_usuario"].'</th>
                        <td>'.$linha["Nome"].'</td>
                        <td>'.$linha["email"].'</td>
                        <td>   
                            <button class="btn btn-warning alterar_usuario" value="'.$linha["id_usuario"].'" data-toggle="modal" 
                                data-target="#modalAlterar">Alterar</button>
        ';

        if($_SESSION["permissao"]=="1"){
            echo '
                            <button class="btn btn-danger remover_usuario" value="'.$linha["id_usuario"].'">Remover</button>
            ';
        }

        echo '
                        </td>
                    </tr>
        ';
        
        $i++;
    }

    if($i==0){
        echo "
            <tr>
                <td colspan='3' class='text-center'>Não há usuários cadastrados ainda</td>
            </tr>
        ";
    }

    echo '
                </tbody>
            </table>
        </container>
    ';

    $titulo = "Alterar Usuário";
    $nome_form = "usuario";

    include "forms_alterar.php";
    include "modal.php";

}else{
    echo "
        <script>location.href='index.php'</script>
    ";
}
rodape();

?>