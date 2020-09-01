<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="../../jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn").click(function(){
                //função cadastrar
                fruta = $("#campo").val();
                $.get("processa.php", {"fruta":fruta}, function(campo){
                    if(campo=="Digite uma fruta no campo!" || campo=="Fruta já cadastrada!"){
                        $("#receptora").html(campo).css("color","red");
                    }else{
                        $("#receptora").html(campo).css("color","green");
                        html = $("#lista").html();
                        $("#lista").html("<li>"+fruta+html+"</li>");
                    }
                });
                $("#campo").val("");
            });
        });
    </script>
</head>
<body>
    <?php
        $_SESSION["cadastrar"]=array();
    ?>
    <input type="text" name="campo" id="campo" placeholder="Cadastre uma fruta.."/>
    <button type="button" id="btn">Cadastro Assincrono</button>
    <hr/>
    <div id="receptora"></div>
    <hr/>
    <ul id="lista">
    </ul>
</body>
</html>