<?php
    include "const_cookie.php";

    $nomeCookie = NOME_COOKIE;
    $valorCookie = base64_encode($_POST["email"]);
    //A validade não é obrigatória, porém se não passar o tempo o cookie é destrido ao fechar o navegador, assim como a sessão
    $validadeCookie = time() + 3600 * 48;//tempo que o cookie irá existir na máquina do cliente
    //time() = total de segundos que foram devolvidos desde 01/01/1976
    $caminhoCookie = "/"; //Em qualquer página da minha aplicação será possível acessar o cookie
    $dominioCookie = "localhost"; //o domínio que aparece na barra de endereço, se for colocar no heroku o dominio deve ser o heroku
    $seguroCookie = false; //Isso significa que o cookie só vai ser transmitido do servidor ao cliente se ele for https, como a aplicação é local deve ser false
    $httpCookie = true; //Se o cookie deve ser acessado apenas via protocolo HTTP um JavaScript não conseguirá acessar

    if(!empty($_POST["lembrete"])){ //Se o usuário tiver marcado o checkbox
        //gravar o cookie - para evitar a repetição de parametros dentro do setcookie é uma boa prática utilizar variáveis
        setcookie($nomeCookie, $valorCookie, $validadeCookie, $caminhoCookie, $dominioCookie, $seguroCookie, $httpCookie);
    }else{
        //apagar o cookie
        if(isset($_COOKIE[$nomeCookie])){
            //O valor não importa, mas de preferencia é bom passar ele vazio
            //time() - 1 é um tempo do passado
            //Se passar as outras variáveis diferentes ele não apaga
            setcookie($nomeCookie, "", time() - 1, $caminhoCookie, $dominioCookie, $seguroCookie, $httpCookie);
        }
    }
?>
