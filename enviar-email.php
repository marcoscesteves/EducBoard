<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

$email_remetente = "contato@aprendendocomvideos.com.br";
$email_usuario = "marcoscesteves@gmail.com";
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
$headers .= "From: $email_remetente\n"; // remetente
$headers .= "Return-Path: $email_remetente\n"; // return-path
$headers .= "Reply-To: $email_usuario\n"; // Endereço (devidamente validado) que o seu usuário informou no contato
$envio = mail("marcoscesteves@gmail.com", "Assunto", "Mensagem", $headers, "-f$email_remetente");

if($envio)
 echo "Mensagem enviada com sucesso";
else
 echo "A mensagem não pode ser enviada";

?>

