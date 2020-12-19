<?php
include "conf.php";

cabecalho();
    if(empty($_POST)){
        echo '
            <div class = "container">
                <div class="row text-center">
                    <div class="col">
                        <h3>Cadastre-se</h3>
                    </div>
                </div>
        
                <form action="form_usuario.php" method="POST">
                    <div class="row">
                        <div class="col-2">
                            Nome:
                        </div>
                        <div class="col">
                            <input type="text" name="nome" class="form-control" placeholder="Nome" max="100" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            Email:
                        </div>
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="Email" max="100" required>
                        </div>
                    </div>
        ';

        if(isset($_SESSION["usuario"])){
            echo '
                <div class="row">
                    <div class="col">Avise ao usuário que a senha padrão será definida!</div>
                </div>
            ';
            ?>

            <input type="hidden" name="senha" class="form-control" value="123"/>

            <?php
        }else{
            echo '
                <div class="row">
                    <div class="col-2">
                        Senha:
                    </div>
                    <div class="col">
                        <input type="password" name="senha" class="form-control" placeholder="****" max="100" required>
                    </div>
                </div>
            ';
        }
                    
        echo '
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

        $nomeUsuario = $_POST["nome"];
        $emailUsuario = $_POST["email"];
        $senhaUsuario = md5($_POST["senha"]);
        
        $query = "INSERT INTO usuario(email, senha, permissao, nome) VALUES('$emailUsuario', '$senhaUsuario', '2', '$nomeUsuario')";
        mysqli_query($conexao, $query)
            or die(mysqli_error($conexao));

        echo "
            <div class = 'container'>
                <div class='alert alert-success' role='alert'>
                    $nomeUsuario cadastrado com sucesso!
                </div>
            </div>
        ";
    }

rodape();

?>