<?php
require_once 'classes/aluno.php';
require_once 'classes/turma.php';
require_once 'cabecalho.php';

$turma = new Turma(); // Corrigido: T maiúsculo
$data = $_POST['data'];
$horario = $_POST['horario'];
$local = $_POST['local'];
$turma->data = $data;
$turma->horario = $horario;
$turma->local = $local;
if (isset($_POST['professores'][0])) { $turma->professor1 = $_POST['professores'][0]; }
if (isset($_POST['professores'][1])) { $turma->professor2 = $_POST['professores'][1]; }
if (isset($_POST['professores'][2])) { $turma->professor3 = $_POST['professores'][2]; }

$mensagem = $turma->inserir();
?>

<?php if (isset($mensagem)): ?>

    <div class="container mt-4">

	    <h4 class="mt-4">Dados da Turma:</h4>
		<ul class="list-group">
			<li class="list-group-item"><strong>Data: </strong> <?php echo date('d/m/Y', strtotime($turma->data)) ?></li>
			<li class="list-group-item"><strong>Horário: </strong> <?php echo $turma->horario; ?></li>
			<li class="list-group-item"><strong>Local: </strong> <?php echo $turma->local; ?></li>
		</ul>
        <div class="alert alert-success" role="alert">
            <?php echo $mensagem; ?>
        </div>
    </div>
<?php endif; ?>

<?php require_once 'rodape.php'; ?>
