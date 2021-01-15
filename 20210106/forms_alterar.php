<?php

    function pais(){
        echo '
            <form>
                <div class="row">
                    <div class="col-4">
                        <label for="cod">
                            Código do país:
                        </label>
                    </div>
                    <div class="col">
                        <input disabled id="cod" type="number" name="cod" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="nomePais">
                            Nome do país:
                        </label>
                    </div>
                    <div class="col">
                        <input type="text" id="nomePais" name="nome_pais" class="form-control">
                    </div>
                </div>
            </form>
        ';
    }

    function estado(){
        echo '
            <form>
                <div class="row">
                    <div class="col-4">
                        <label for="codEstado">
                            Código:
                        </label>
                    </div>
                    <div class="col">
                        <input id="codEstado" disabled type="number" name="cod" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="nomeEstado">
                            Nome:
                        </label>
                    </div>
                    <div class="col">
                        <input type="text" id="nomeEstado" name="nome_estado" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="siglaEstado">
                            Sigla:
                        </label>
                    </div>
                    <div class="col">
                        <input type="text" id="siglaEstado" name="sigla_estado" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="inputEstado">
                            País:
                        </label>
                    </div>
                    <div class="col">
                        <select id="inputEstado" class="form-control" name="paisEstado">
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
            </form>
        ';
    }

    function cidade(){
        echo '
            <form>
                <div class="row">
                    <div class="col-2">
                        <label for="codCidade">
                            Código:
                        </label>
                    </div>
                    <div class="col">
                        <input disabled id="codCidade" type="number" name="cod" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="nomeCidade">
                            Nome:
                        </label>
                    </div>
                    <div class="col">
                        <input type="text" id="nomeCidade" name="nome" class="form-control" max="100" placeholder="Nome" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label for="inputEstado">
                            Estados:
                        </label>
                    </div>
                    <div class="col">
                        <select id="inputEstado" class="form-control" name="cidadeEstado" required>
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
                        <label for="inputPais">
                            País:
                        </label>
                    </div>
                    <div class="col">
                        <select id="inputPais" class="form-control" name="cidadePais" required>
        ';

        $select="SELECT * FROM pais";
        $resultado = mysqli_query($conexao, $select) or die($conexao);

        while($linha = mysqli_fetch_assoc($resultado)){
            echo '<option value="'.$linha["cod_pais"].'">'.$linha["nome_pais"].'</option>';
        }

        echo '
                        </select>
                    </div>
                </div>
            </form>
        ';
    }

    function usuario(){
        echo '
            <form>
                <div class="row">
                    <div class="col-4">
                        <label for="codUsuario">
                            Código do usuário:
                        </label>
                    </div>
                    <div class="col">
                        <input disabled id="codUsuario" type="number" name="cod" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="nomeUsuario">
                            Nome do usuário:
                        </label>
                    </div>
                    <div class="col">
                        <input type="text" id="nomeUsuario" name="nome_usuario" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="emailUsuario">
                        E-mail:
                    </div>
                    <div class="col">
                        <input type="text" id="emailUsuario" name="email_usuario" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="trocarSenha">
                            Escolha:
                        </label>
                    </div>
                    <div class="col">
                        <input type="checkbox" id="trocarSenha" name="trocar_senha" value="1"/> Trocar a senha
                    </div>
                    <div id="trocar_senha" style="display:none;" class="col">
                        <label for="senhaCadastro">
                            Digite a senha
                        </label>
                        <input type="password" id="senhaCadastro" name="senha_cadastro" placeholder="Digite a senha..." class="form-control">
                        <label for="confirmeSenha">
                            Confirme a senha
                        </label>
                        <input type="password" id="confirmeSenha" name="confirma_cadastro" placeholder="Confirme a senha..." class="form-control">
                    </div>
                </div>
            </form>
        ';
    }

?>