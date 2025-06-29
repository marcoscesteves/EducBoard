<!DOCTYPE html>
<?php 

    // Configurar o título dentro das configurações centralizadas do site (config.php)
    $config = require __DIR__ . '/config/config.php';
    $titulo = $config['site']['tituloAba'];
    $tituloCabecalho = $config['site']['tituloCabecalho'];
    // Carregar os parâmetros de localidade/idioma do config.php
    $lcTime = $config['site']['idioma']['LC_TIME'];
    $lcNumeric = $config['site']['idioma']['LC_NUMERIC'];
    $lcMonetary = $config['site']['idioma']['LC_MONETARY'];
    $lcCtype = $config['site']['idioma']['LC_CTYPE'];

    // Aplicar as configurações de localidade usando os parâmetros de config.php
    setlocale(LC_TIME, $lcTime, $lcTime, $lcNumeric);
    setlocale(LC_MONETARY, $lcMonetary, $lcMonetary, $lcNumeric);
    setlocale(LC_CTYPE, $lcCtype, $lcCtype);

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $paginaAtual = basename($_SERVER['PHP_SELF']);
    $paginaPublica = ['index.php', 'esqueci-senha.php', 'novo.php'];  

    if (!in_array($paginaAtual, $paginaPublica)) {
        if ( !isset($_SESSION['nome']) ) {
            header('Location: index.php');
            exit;
        } 
    }

// Desativa cache do navegador para impedir uso do "voltar"
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/default.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" >
</head>
<body>


<div class="container topo_cabecalho">
   
   <div class="row d-flex justify-content-center">

   <img src="img/logoEducBoard.png" alt="Logo da Plataforma"  class="logoRetangular">
        
    </div> 
        
   <div class="row">
         
   <div class="topo_cabecalho_interno d-flex justify-content-center rounded">
      <p><?php echo $tituloCabecalho ?></p>     
   </div> 
   
    </div>
   
   
   
</div>
   
