<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Engenharia Reversa</title>
    <style>
        img{
            width:100px;
            height: 100px;
        }
    </style>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#ocultar").change(function(){
                
                var ocultar = $("#ocultar").val();
                if($("#"+ocultar).css('display')!='none'){
                    $('#'+ocultar).fadeOut();
                }else{
                    $("#mensagem").html("Esta imagem já está oculta");
                }

                $("#ocultar").val("");
            });

            
            $("#mostrar").change(function(){

                var mostrar = $("#mostrar").val();
                if($("#"+mostrar).css('display')=='none'){
                    $('#'+mostrar).fadeIn();
                }else{
                    $("#mensagem").html("Esta imagem já está na tela");
                }

                $("#mostrar").val("");
            });
        });
    </script>
</head>
<body>
    <div id="mensagem"></div>
    <form>
        <select name="ocultar" id="ocultar">
            <option value="">Selecione qual ocultar</option>
            <option value="img1">1</option>
            <option value="img2">2</option>
            <option value="img3">3</option>
            <option value="img4">4</option>
            <option value="img5">5</option>
            <option value="img6">6</option>
            <option value="img7">7</option>
            <option value="img8">8</option>
        </select>
        <select id="mostrar">
            <option value="">Selecione qual mostrar</option>
            <option value="img1">1</option>
            <option value="img2">2</option>
            <option value="img3">3</option>
            <option value="img4">4</option>
            <option value="img5">5</option>
            <option value="img6">6</option>
            <option value="img7">7</option>
            <option value="img8">8</option>
        </select>
        <hr/>
        <table>
            <tr>
                <td><div id="img1"><img src="img/img1.png" /></div> <td>
                <td><div id="img2"><img src="img/img2.png" /></div> <td>
                <td><div id="img3"><img src="img/img3.png" /></div> <td>
                <td><div id="img4"><img src="img/img4.png" /></div> <td>
                <td><div id="img5"><img src="img/img5.png" /></div> <td>
                <td><div id="img6"><img src="img/img6.png" /></div> <td>
                <td><div id="img7"><img src="img/img7.png" /></div> <td>
                <td><div id="img8"><img src="img/img8.png" /></div> <td>
            </tr>
        </table>
    </form>
</body>
</html>