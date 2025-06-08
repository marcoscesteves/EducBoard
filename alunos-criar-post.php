<?php include 'auto_load.php'; 
header('Content-Type: text/html; charset=utf-8');

$aluno = new aluno();
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$senha_recebida = $_POST['senha'];
$telefone = $_POST['telefone'];
$profissao = $_POST['profissao'];
$curso = $_POST['curso'];
$periodo = $_POST['periodo'];
//$senha = password_hash($senha_recebida, PASSWORD_DEFAULT); 
$senha = base64_encode(trim($senha_recebida));
$aluno->nome = $nome;
$aluno->email = $email;
$aluno->cpf = $cpf;
$aluno->telefone = $telefone;
$aluno->profissao = $profissao;
$aluno->curso = $curso;
$aluno->periodo = $periodo;
$aluno->senha = $senha;

if ($_POST['operacao'] === 'atualizar') { 
    $aluno->atualizar();
    $_SESSION['mensagem'] = "{$aluno->nome}, seus dados foram atualizados com sucesso!"; 
    header('Location: painel-principal.php');    
} else {
    $aluno->inserir();
    $_SESSION['mensagem'] = "{$aluno->nome}, sua inscrição foi realizada! <br/><br/>";
    header('Location: index.php');
}


?>
