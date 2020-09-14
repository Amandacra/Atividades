<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8"/>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input[name='cep']").blur(function(){
                var cep = 'http://viacep.com.br/ws/' + $("input[name='cep']").val() + "/json/";
                $.get(cep, function(dadosLocalizacao){
                    $("input[name='logradouro']").val(dadosLocalizacao.logradouro);
                    $("input[name='bairro']").val(dadosLocalizacao.bairro);
                    $("input[name='cidade']").val(dadosLocalizacao.localidade);
                    $("input[name='estado']").val(dadosLocalizacao.uf);
                    $("input[name='numero']").focus();
                    $("#msg").html("<b style='color:red'></b>");
                }).fail(function(){
                    $("#msg").html("<b style='color:red'>CEP INVALIDO</b>")
                    $("input[name='cep']").focus();
                    $("input[name='logradouro']").val("");
                    $("input[name='bairro']").val("");
                    $("input[name='numero']").val("");
                    $("input[name='complemento']").val("");
                    $("input[name='cidade']").val("");
                    $("input[name='estado']").val("");
                });
            });
        });
    </script>
    </head>
    <body>
        <div id="msg"></div>
        <hr/>
        <form>
            <input type="text" name="cep" placeholder="CEP..."/>
            <hr/>
            <input disabled type="text" name="logradouro" placeholder="Logradouro..."/>
            <input disabled type="text" name="bairro" placeholder="Bairro..."/>
            <input type="text" name="numero" placeholder="Numero..."/>
            <input type="text" name="complemento" placeholder="Complemento..."/>
            <br>
            <br>
            <input disabled type="text" name="cidade" placeholder="Cidade..."/>
            <input disabled type="text" name="estado" placeholder="Estado..."/>
        </form>
    </body>
</html>