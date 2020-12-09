<script>
    $(function(){
        $(".remover_pais").click(function(){
            tabelas = "pais";
            value_codPais = $(this).val();
            colunas = "cod_pais";
            dados = {tabela: tabelas, cod: value_codPais, coluna: colunas}
            $.post("remover.php", dados, function(resultado){
                if(resultado == "true"){
                    $(".alerta").html('<div class="alert alert-success" role="alert">País removido com sucesso</div>');
                    $("button[value='"+value_codPais+"']").closest("tr").remove();
                }
            });
        });
    });
    
    $(function(){
        $(".remover_estado").click(function(){
            tabelas = "estado";
            value_codEstado = $(this).val();
            colunas = "cod_estado";
            dados = {tabela: tabelas, cod: value_codEstado, coluna: colunas}
            $.post("remover.php", dados, function(resultado){
                if(resultado == "true"){
                    $(".alerta").html('<div class="alert alert-success" role="alert">Estado removido com sucesso</div>');
                    $("button[value='"+value_codEstado+"']").closest("tr").remove();
                }
            });
        });
    });

    $(function(){
        $(".remover_cidade").click(function(){
            tabelas = "cidade";
            value_codCidade = $(this).val();
            colunas = "cod_cidade";
            dados = {tabela: tabelas, cod: value_codCidade, coluna: colunas}
            $.post("remover.php", dados, function(resultado){
                if(resultado == "true"){
                    $(".alerta").html('<div class="alert alert-success" role="alert">Cidade removido com sucesso</div>');
                    $("button[value='"+value_codCidade+"']").closest("tr").remove();
                }
            });
        });
    });
</script>