<?php require 'auto_load.php';
header('Content-Type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Painel Principal</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/default.css" type="text/css">
</head>
<body>
    
    
    
    <?php $turma = new turma();
    $turma->id = $_GET['turma_id'];
    if ($turma->inscreverAlunoEmTurma($_SESSION['id']) ) { ?> 
    
     <?php   $linha = $turma->listarDadosDeTurmaPorId($turma->id); 
        
        $_SESSION['inscricao'] = 'Você foi inscrito na turma do dia '.$linha['data'].' às '.$linha['horario']; 
          
    }
    
    header("Location: confirmar-inscricao-aluno.php?turma_id={$turma->id}");  
    
    ?>

    
    </body>
</html>