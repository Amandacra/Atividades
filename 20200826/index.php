<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Troca de Estilos</title>
    </head>
    <style>
        #quadrado{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        #quadrado2{
                border-style:solid;
                border-width:1px;
                width:500px;
                height:500px;
        }
        button{
            border: 0px;
        }
    </style>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script>
        $(function(){
            $("#campo").keyup(function(){
                $("#quadrado2").html($("#campo").val());
            });
            $("#negrito").click(function(){
                if($("#quadrado2").css("font-weight") != 400){
                    $("#quadrado2").css("font-weight", "normal");
                }
                else{
                    $("#quadrado2").css("font-weight", "bold");
                }
            });
            $("#italico").click(function(){
                if($("#quadrado2").css("font-style") == "normal"){
                    $("#quadrado2").css("font-style", "italic");
                }
                else{
                    $("#quadrado2").css("font-style", "normal");
                }
            });
            $("#sublinhado").click(function(){
                if($("#quadrado2").css("text-decoration") == "none solid rgb(0, 0, 0)"){
                    $("#quadrado2").css("text-decoration","underline");
                }
                else{
                    $("#quadrado2").css("text-decoration","none");
                }
            });
        });
    </script>
    <body>
        <h3>Troca de Estilos</h3>
        <button id="negrito"><img src="negrito.png"/></button>
        <button id="italico"><img src="italico.png"/></button>
        <button id="sublinhado"><img src="sublinhado.png"/></button>
        <div style = "display: table">
            <div id="quadrado" style = "display: table-cell;">
                <textarea id = "campo" name = "campo" placeholder="Digite aqui"></textarea>
            </div>
            <div id="quadrado2" style = "display: table-cell;"></div>
        </div>
    </body>
</html>