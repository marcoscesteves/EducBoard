<!DOCTYPE html>
<?php if ( ($titulo <>'COASTRO') && (!isset($_SESSION['nome'])) ) {
    header('Location: index.php');
} ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/default.css" type="text/css">
    <link rel="stylesheet" href="fontawesome/css/all.css" type="text/css"> 
    <script defer src="fontawesome/js/all.js"></script>
</head>
<body>


<div class="container topo_cabecalho">
   
   <div class="row d-flex justify-content-center">
   
   <img src="img/logoUFRJ.jpeg" class="logo">
   <img src="img/logoCrux.jpg" class="logo">
   <img src="img/logoIFF.jpg " alt="" class="logo">
   
        
    </div> 
        
   <div class="row">
         
   <div class="topo_cabecalho_interno d-flex justify-content-center">
      <p>CRUX</p>     
   </div> 
   
    </div>
   
   
   
</div>
   
