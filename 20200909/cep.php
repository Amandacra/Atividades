<!DOCTYPE html>
<html lang="pt-br">
    <header>
    <meta charset="UTF-8"/>
        $(document).ready(function(){
            $("input[name='cep']").blur(function(){
                var cep="link concatenado com + $("input[name'cep']").val() +;
                $get(cep, function(r){
                    $("input[name'logradouro']").val(r.logradouro);
                    ..
                    no input name numero ao invés do val vai o .focus();
                })
            }).fail(function(r){
                $("#msg").html("<b style='color:red'>CEP INVALIDO</b>")
                $("input[name='cep']").focus();
            });
        });
    </header>
    <body>
        <div id="msg"></div>
        <hr/>
        <form>
            <input type="text" name="cep" placeholder="CEP..."/>
            <hr/>
            <input disabled type="text" name="logradouro" placeholder="CEP..."/>
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