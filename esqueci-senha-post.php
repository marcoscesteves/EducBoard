<?php
require_once 'classes/aluno.php';
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function gerarSenha($tamanho = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr(str_shuffle(str_repeat($chars, $tamanho)), 0, $tamanho);
}

header('Content-Type: text/html; charset=utf-8');

$configReceiver = require __DIR__ . '/config/config.php';
$config = $configReceiver['email']; // Filtrar apenas configurações de e-mail

$email_destino = $_POST['email'];
$aluno = new aluno();
$linha = $aluno->buscarAluno($email_destino);

if ($linha && isset($linha['email']) && $linha['email'] === $email_destino) {
    $novaSenha =  gerarSenha(8);
    $aluno->alterarSenhaDoAluno($linha['email'], $novaSenha);

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP do Gmail
        $mail->isSMTP();
        $mail->Host       = $config['host'];
        $mail->SMTPAuth   = $config['SMTPAuth'];
        $mail->Username   = $config['Username'];
        $mail->Password   = $config['Password'];
        $mail->SMTPSecure = $config['SMTPSecure'];
        $mail->Port       = $config['Port'];

        $mail->setFrom($config['from_email'], $config['from_nome']);
        $mail->addAddress($linha['email'], $linha['nome']);

        // Conteúdo do e-mail
        $mail->isHTML(false);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Recuperação de Senha - Plataforma Educacional';
        $mail->Body    = "Prezado(a) {$linha['nome']},
        Sua nova senha é: {$novaSenha}
        Recomenda-se alterá-la após o login no menu 'Dados pessoais'.
        
        Atenciosamente,
        Equipe EducBoard";

        $mail->send();

        header('Location: index.php?aviso=true');
        exit;
    } catch (Exception $e) {
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
    }
} else {
    header('Location: esqueci-senha.php?erro=email-nao-encontrado');
    exit;
}
