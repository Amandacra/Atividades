<!doctype html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Exercício Compartilhado</title>

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
        </style>
        <script src = "jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function(){
                //Escreve o texto
                $("#campo").keyup(function(){

                    var HTML = $("#campo").val();
                    $("#quadrado2").text(HTML);
                });

                //CSS
                $("#negrito").click(function(){
                    var fontWeight = $("#quadrado2").css("fontWeight");

                    if(fontWeight == 400){
                        $("#quadrado2").css("fontWeight", "bold");
                    }else{
                        $("#quadrado2").css("fontWeight", "normal");
                    }
                });


                $("#italico").click(function(){
                    var fontStyle = $("#quadrado2").css("fontStyle");

                    if(fontStyle == "normal"){
                        $("#quadrado2").css("fontStyle", "italic")
                    }else{
                        $("#quadrado2").css("fontStyle", "normal")
                    }
                });


                $("#sublinhado").click(function(){
                    var textDecoration = $("#quadrado2").css("textDecoration");

                    if(textDecoration.charAt(0) == "n"){
                        $("#quadrado2").css("textDecoration", "underline")
                    }else{
                        $("#quadrado2").css("textDecoration", "none")
                    }
                });

                $("#salvar").click(function(){
                    var texto = $("#quadrado2").html();
                    var Negrito = $("#quadrado2").css("fontWeight");
                    var Italico = $("#quadrado2").css("fontStyle");
                    var Sublinhado = $("#quadrado2").css("textDecoration");
                    var nomeArquivo = $("#nomeArquivo").val();

                    if(nomeArquivo==''){
                        $("#mensagem").css("color", "red");
                        $("#mensagem").css("fontWeight", "bold");
                        $("#mensagem").html("Preencha o nome do arquivo!");
                    }else{
                        $.get("valores.php", {"nomeArquivo": nomeArquivo, "texto": texto, "Negrito": Negrito,
                            "Italico": Italico, "Sublinhado": Sublinhado}, function(resultado){
                                if(resultado == 'true'){
                                    $("#mensagem").css("color", "black");
                                    $("#mensagem").css("fontWeight", "normal");
                                    $("#mensagem").html(''+nomeArquivo+' criado com sucesso!');
                                    $("#links").html("<a target='_blank' href=\"criacoes/"+nomeArquivo+".html\">"+nomeArquivo+".html | </a>"+$("#links").html());
                                }

                        });
                    }   
                });

                
            });
        </script>
    </head>
    <body>
        <h3> Exercício compartilhado - AJAX</h3>

        <img id = "negrito" src = "negrito.png"/>
        <img id = "italico" src = "italico.png"/>
        <img id = "sublinhado" src = "sublinhado.png"/>

        <br/>

        <input id="nomeArquivo" type = "text" name = "nomeArquivo" placeholder="Nome do arquivo..."/>
        <input type="button" id="salvar" value="Salvar"/>
        
        <div id="mensagem"></div>

        <hr/>

        <div id="links"></div>

        <hr/>

        <div style = "display: table">
            <div id = "quadrado" style = "display: table-cell;">
                <textarea id = "campo" name = "campo" placeholder = "Digite aqui"></textarea>
            </div>

            <div id = "quadrado2" style = "display: table-cell;"></div>
        </div>
    </body>
</html>
