<?php
  if (PATH_SEPARATOR == ";") {
    $quebraLinha = "\r\n";
  } else {
    $quebraLinha = "\n";
  }

  $destinatario = "arte@revistamaua.com.br";
  $assunto = "Mensagem: Fale Conosco do Portal";
  $nome = $_POST["campo-nome"];
  $email = $_POST["campo-email"];
  $mensagem = $_POST["campo-mensagem"];
  $conteudo = 
    '<p><b>Nome:</b> ' . $nome . '</p>
     <p><b>E-mail:</b> ' . $email . '</p>
     <p><b>Assunto:</b> ' . $assunto . '</p>
     <p><b>Mensagem:</b><pre> ' . $mensagem . '</pre></p>';

  $headers .= "MIME-Version: 1.1" . $quebraLinha;
  $headers .= "Content-type: text/html; charset=utf-8" . $quebraLinha;
  $headers .= "From: " . $email . $quebraLinha;

  if(!mail($destinatario, $assunto, $conteudo, $headers , "-r" . $destinatario)) {
    mail($destinatario, $assunto, $conteudo, $headers);
  }
?>