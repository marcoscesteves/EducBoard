<?php require_once 'classes/aluno.php';
require_once 'classes/turma.php';
session_start();
header('Content-Type: text/html; charset=utf-8');

$turma = new turma();
$turma->id = $_GET['turmaid'];
$turma->retirarAlunoDeTurma();


header('Location: minhas-inscricoes.php');