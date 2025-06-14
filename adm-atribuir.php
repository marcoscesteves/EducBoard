<?php
require_once 'classes/conexao.php';
require_once 'classes/aluno.php';
$titulo = 'Gerenciar administradores';
require_once 'cabecalho.php';

$atualizacaoRealizada = isset($_GET['status']) && $_GET['status'] === 'ok';

$conexao = Conexao::pegarConexao();
$stmt = $conexao->query("SELECT * FROM alunos ORDER BY nome");
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
  <h3 class="mb-4">Selecione os alunos que serão administradores</h3>

  <form method="POST" action="adm-processa-transformacao.php">
    <?php foreach ($alunos as $aluno): ?>
      <div class="custom-control custom-checkbox mb-2">
        <input type="checkbox" class="custom-control-input" id="aluno<?= $aluno['id'] ?>" name="administradores[]" value="<?= $aluno['id'] ?>" <?= $aluno['administrador'] == 1 ? 'checked' : '' ?>>
        <label class="custom-control-label" for="aluno<?= $aluno['id'] ?>">
          <?= htmlspecialchars($aluno['nome']) ?>
        </label>
      </div>

    <?php endforeach; ?>

    <div class="mt-4">
     <button type="submit" class="btn btn-success">
      <?= $atualizacaoRealizada ? 'Atualização realizada' : 'Salvar' ?>
    </button>

    </div>
  </form>
</div>

<?php require_once 'rodape.php'; ?>
