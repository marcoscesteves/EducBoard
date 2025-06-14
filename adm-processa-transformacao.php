<?php
require_once 'classes/conexao.php';

$conexao = Conexao::pegarConexao();

// Zera todos os administradores primeiro
$conexao->exec("UPDATE alunos SET administrador = 0");

if (!empty($_POST['administradores']) && is_array($_POST['administradores'])) {
  $stmt = $conexao->prepare("UPDATE alunos SET administrador = 1 WHERE id = ?");
  foreach ($_POST['administradores'] as $id) {
    $stmt->execute([$id]);
  }
}

// Redireciona com status
header("Location: adm-atribuir.php?status=ok");
exit;