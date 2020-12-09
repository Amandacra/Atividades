<?php

    function pais(){
        echo '
            <form>
                <div class="row">
                    <div class="col-4">
                        Código do país:
                    </div>
                    <div class="col">
                        <input disabled type="number" name="cod" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Nome do país:
                    </div>
                    <div class="col">
                        <input type="text" name="nome_pais" class="form-control">
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
                        Código:
                    </div>
                    <div class="col">
                        <input disabled type="number" name="cod" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Nome:
                    </div>
                    <div class="col">
                        <input type="text" name="nome_estado" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Sigla:
                    </div>
                    <div class="col">
                        <input type="text" name="sigla_estado" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        País:
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
                        Código:
                    </div>
                    <div class="col">
                        <input disabled type="number" name="cod" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Nome:
                    </div>
                    <div class="col">
                        <input type="text" name="nome" class="form-control" max="100" placeholder="Nome" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Estados:
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
                        País:
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
?>