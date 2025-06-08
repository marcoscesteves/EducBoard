<?php require 'auto_load.php';

$aluno = new aluno();
/*
if ($_POST['operacao'] == 'nova-senha') {
    
 
// realizar procedimento para enviar nova senha ao usuário;
} else {*/


$var = $aluno->acessar($_POST['email'],$_POST['senha']);

if ($var == true) {
   $linha = $aluno->buscarAluno($_POST['email']);
   $_SESSION["id"] = $linha['id'];
   $_SESSION["nome"] = $linha['nome']; 
   $_SESSION["email"] = $linha['email'];  
   header('Location: painel-principal.php');  
} else { 
    header('Location: index.php?erro=true');
}

?>
  
