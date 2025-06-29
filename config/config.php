<?php

return [

    // Substitua os dados para o projeto:
    'site' => [
        'tituloAba' => 'EducBoard - A sua plataforma educacional', // Título que apareçe na aba dos navegador (em todas as páginas)
        'tituloCabecalho' => 'EducBoard - A sua plataforma educacional', // Título que aparece no cabeçalho
    ],

    // 🗃️ Conexão com o banco de dados interno da aplicação
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'name' => 'crux',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    ],


    // 🗃️ Conexão com serviço de envio para e-mails 
    'email' => [
        'host'       => 'smtp.gmail.com',
        'SMTPAuth'   => 'true',
        'Username'   => 'meu_email@gmail.com',   // Seu Gmail
        'Password'   => 'password_app_code',     // 🔒 Senha de app, NÃO É A SENHA DE ACESSO AO GMAIL
        'SMTPSecure' => 'PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS',
        'Port'       => '587',
        'from_email' => 'meu_email@gmail.com',
        'from_nome'  => 'Plataforma Educacional',
    ]

];

?>