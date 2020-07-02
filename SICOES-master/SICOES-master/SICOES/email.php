<?php

if(isset($_POST['email']) && !empty($_POST['email'])) {

$nome = addslashes($_POST['nome']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['mensagem']);

$to = "thiagoaugustocam@hotmail.com";
$subjet = "SICOES - Reclamação ou sugestão";

$body = "Nome: ".$nome. "\r\n".
        "E-mail: ".$email. "\r\n".
        "Mensagem: ".$mensagem;

$header = "From:thiagoaugustocam@hotmail.com"."\r\n".
          "Reply-To:".$email. "\e\n".
          "X=Malier:PHP/".phpversion();

       if( mail($to, $subjet, $body, $header)) {

        echo("E-mail enviado com sucesso.");
       } else {
        echo("Não foi possível envio do e-mail.");
       }

    }
?>