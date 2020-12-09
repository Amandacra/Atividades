<script>
    $(function(){

        var nometabela;

        function define_alterar_remover(){

            $(".alterar_pais").click(function(){
                
                value_cod = $(this).val();
                nometabela = "pais";
                dados = {cod:value_cod, tabela:nometabela};
                
                $.post("alterar.php", dados, function(resultado){
                    r = resultado[0]; 

                    $("input[name='cod']").val(r.cod_pais);
                    $("input[name='nome_pais']").val(r.nome_pais);
                });

            });

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
    
            $(".alterar_estado").click(function(){
                
                value_cod = $(this).val();
                nometabela = "estado";
                dados = {cod:value_cod, tabela:nometabela};
                
                $.post("alterar.php", dados, function(resultado){
                    r = resultado[0]; 

                    $("input[name='cod']").val(r.cod_estado);
                    $("input[name='nome_estado']").val(r.nome_estado);
                    $("input[name='sigla_estado']").val(r.sigla);
                    $("select[name='paisEstado']").val(r.pais_estado);
                });
            });

            $(".remover_estado").click(function(){

                tabelas = "estado";
                value_cod = $(this).val();
                colunas = "cod_estado";
                dados = {tabela: tabelas, cod: value_cod, coluna: colunas}

                $.post("remover.php", dados, function(resultado){
                    if(resultado == "true"){
                        $(".alerta").html('<div class="alert alert-success" role="alert">Estado removido com sucesso</div>');
                        $("button[value='"+value_codEstado+"']").closest("tr").remove();
                    }
                });

            });
    
            $(".alterar_cidade").click(function(){
                
                value_cod = $(this).val();
                nometabela = "cidade";
                dados = {cod:value_cod, tabela:nometabela};
                
                $.post("alterar.php", dados, function(resultado){
                    r = resultado[0]; 

                    $("input[name='cod']").val(r.cod_cidade);
                    $("input[name='nome']").val(r.nome_cidade);
                    $("select[name='cidadeEstado']").val(r.cidade_estado);
                    $("select[name='cidadePais']").val(r.cidade_pais);
                });

            });

            $(".remover_cidade").click(function(){

                tabelas = "cidade";
                value_codCidade = $(this).val();
                colunas = "cod_cidade";
                dados = {tabela: tabelas, cod: value_codCidade, coluna: colunas}

                $.post("remover.php", dados, function(resultado){
                    if(resultado == "true"){
                        $(".alerta").html('<div class="alert alert-success" role="alert">Cidade removida com sucesso</div>');
                        $("button[value='"+value_codCidade+"']").closest("tr").remove();
                    }
                });

            });
        }

        define_alterar_remover();

        $(".salvar").click(function(){

            if(nometabela == "pais"){

                dados = {
                    tabela:nometabela,
                    cod:$("input[name='cod']").val(),
                    nome:$("input[name='nome_pais']").val()
                };

            }else if(nometabela == "estado"){

                dados = {
                    tabela:nometabela,
                    cod:$("input[name='cod']").val(),
                    nome:$("input[name='nome_estado']").val(),
                    sigla:$("input[name='sigla_estado']").val(),
                    pais:$("select[name='paisEstado']").val()
                };

            }else if(nometabela == "cidade"){

                dados = {
                    tabela:nometabela,
                    cod:$("input[name='cod']").val(),
                    nome:$("input[name='nome']").val(),
                    estado:$("select[name='cidadeEstado']").val(),
                    pais:$("select[name='cidadePais']").val()
                };

            }

            $.post("update.php",dados,function(resultado){
                if(resultado=='1'){
                    $(".alerta").html('<div class="alert alert-success" role="alert">'+nometabela+' atualizado com sucesso</div>');
                    $(".close").click();
                    atualizar_tabela();
                }else{
                    $(".alerta").html('<div class="alert alert-warming" role="alert">Falha na atualização do '+nometabela+'</div>');
                }
            });

        });

        function atualizar_tabela(){
            
            if(nometabela=="pais"){

                $.post("alterar.php",{tabela:"pais"},function(resultado){
                    t = "";

                    $.each(resultado, function(i,p){
                        t += "<tr>";
                        t +=    "<th scope='row'>"+p.cod_pais+"</th>";
                        t +=    "<td>"+p.nome_pais+"</td>";
                        t +=    "<td>";
                        t +=        "<button class='btn btn-warning alterar_pais' value='"+p.cod_pais+"' data-toggle='modal' data-target='#modalAlterar'>Alterar</button>";
                        t +=        "<button class='btn btn-danger remover_pais' value='"+p.cod_pais+"'>Remover</button>";
                        t +=    "</td>";
                        t += "</tr>";
                    });

                    $(".tbody").html(t);
                    define_alterar_remover();
                });

            }else if(nometabela=="estado"){

                $.post("seleciona_estado.php",function(resultado){
                    t = "";

                    $.each(resultado, function(i,p){
                        t += "<tr>";
                        t +=    "<th scope='row'>"+p.cod_estado+"</th>";
                        t +=    "<td>"+p.nome_estado+"</td>";
                        t +=    "<td>"+p.sigla+"</td>";
                        t +=    "<td>"+p.nome_pais+"</td>";
                        t +=    "<td>";
                        t +=        "<button class='btn btn-warning alterar_estado' value='"+p.cod_estado+"' data-toggle='modal' data-target='#modalAlterar'>Alterar</button>";
                        t +=        "<button class='btn btn-danger remover_estado' value='"+p.cod_estado+"'>Remover</button>";
                        t +=    "</td>";
                        t += "</tr>";
                    });

                    $(".tbody").html(t);
                    define_alterar_remover();
                });

            }else if(nometabela == "cidade"){

                console.log("Fora");
                $.post("seleciona_cidade.php",function(resultado){
                    t = "";
                    console.log(resultado);

                    $.each(resultado, function(i,p){
                        t += "<tr>";
                        t +=    "<th scope='row'>"+p.cod_cidade+"</th>";
                        t +=    "<td>"+p.nome_cidade+"</td>";
                        t +=    "<td>"+p.nome_estado+"</td>";
                        t +=    "<td>"+p.nome_pais+"</td>";
                        t +=    "<td>";
                        t +=        "<button class='btn btn-warning alterar_cidade' value='"+p.cod_cidade+"' data-toggle='modal' data-target='#modalAlterar'>Alterar</button>";
                        t +=        "<button class='btn btn-danger remover_cidade' value='"+p.cod_cidade+"'>Remover</button>";
                        t +=    "</td>";
                        t += "</tr>";
                    });

console.log(t);
                    $(".tbody").html(t);
                    define_alterar_remover();
                });
            }
        }
    });
</script>