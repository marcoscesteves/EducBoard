<?php
require_once 'classes/aluno.php';
header('Content-Type: text/html; charset=utf-8');

$email_remetente = "contato@aprendendocomvideos.com.br";
$email_destino = $_POST['email'];
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
$headers .= "From: $email_remetente\n"; // remetente
$headers .= "Return-Path: $email_remetente\n"; // return-path
$headers .= "Reply-To: $email_destino\n"; // Endereço (devidamente validado) que o seu usuário informou no contato

// Checar se o e-mail informado está correto

// Se correto, enviar e-mail com o password;

$aluno = new aluno();
$linha = $aluno->buscarAluno($_POST['email']);

if ($linha['email'] == $_POST['email']) {
    
    $corpoDoEmail = "Prezado, ". $linha['nome']. " ! 
    Informo que sua nova senha para acesso é: 'mudar123' 
    Favor alterar para uma nova senha no menu 'Alterar meus dados' ";
    
    
    $envio = mail($email_destino, "Recuperar acesso à plataforma do COASTRO", $corpoDoEmail, $headers, "-f$email_remetente");
    if ( $envio ){
        
        $aluno->alterarSenhaDoAluno($linha['email'],'mudar123');
        //$_GET['avisoEnvio'] = 'A sua nova senha foi enviada para o e-mail cadastrado';
        header('Location: index.php?aviso=true');
    } else {
        echo "A mensagem não pode ser enviada";
    }
    
} else {
    
    echo "Prezado usuário, o e-mail " . $linha['email'] . " não é o e-mail de 
    um usuário válido!";
}



?>




