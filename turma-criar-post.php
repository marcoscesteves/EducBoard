<?php require_once 'classes/aluno.php';
require_once 'classes/turma.php';
header('Content-Type: text/html; charset=utf-8');

$turma = new turma();
$data = $_POST['data'];
$horario = $_POST['horario'];
$local = $_POST['local'];
$turma->data = $data;
$turma->horario = $horario;
$turma->local = $local;
if (isset($_POST['professores'][0])) { $turma->professor1 = $_POST['professores'][0];}
if (isset($_POST['professores'][1])) { $turma->professor2 = $_POST['professores'][1];}
if (isset($_POST['professores'][2])) { $turma->professor3 = $_POST['professores'][2];}


// percorrer Array:
/*for($i=0;$i<count($_POST['professores']);$i++) //faz o loop nos chechkbox enviados
	{
		$turma->professores[$i] = $_POST['professores'][$i];
	
	}
*/


$turma->inserir();


/*header('Location: painel-principal.php'); */
