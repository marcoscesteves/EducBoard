<?php include 'auto_load.php'; 
header('Content-Type: text/html; charset=utf-8');
require_once 'cabecalho.php';

$professor = new professor();

$professor->nome     = $_POST['nome'];
$professor->email    = $_POST['email'];
$professor->cpf      = $_POST['cpf'];
$professor->telefone = $_POST['telefone'];

$mensagem = $professor->inserir();


?>

<?php if (isset($mensagem)): ?>

    <div class="container mt-4">
        <h4 class="mt-4">Dados do Professor Cadastrado:</h4>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nome: </strong> <?php echo $professor->nome; ?></li>
            <li class="list-group-item"><strong>E-mail: </strong> <?php echo $professor->email; ?></li>
            <li class="list-group-item"><strong>CPF: </strong> <?php echo $professor->cpf; ?></li>
            <li class="list-group-item"><strong>Telefone: </strong> <?php echo $professor->telefone; ?></li>
        </ul>

        <div class="alert alert-success mt-3" role="alert">
            <?php echo $mensagem; ?>
        </div>
    </div>

<?php endif; ?>

<?php require_once 'rodape.php'; ?>
