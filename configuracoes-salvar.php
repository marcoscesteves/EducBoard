<?php require_once 'auto_load.php';
require_once 'classes/conexao.php';
$titulo = 'Mensagem salva para turmas. ';
require_once 'cabecalho.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'] ?? '';
    $chave = 'texto_padrao_para_inscricoes';

    $conexao = Conexao::pegarConexao();

    // Usa INSERT com ON DUPLICATE KEY UPDATE para atualizar se já existir
    $sql = "INSERT INTO configuracoes (chave, valor) VALUES (:chave, :valor)
            ON DUPLICATE KEY UPDATE valor = :valor";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':chave', $chave);
    $stmt->bindParam(':valor', $valor);
    ?>
    <div class="row justify-content-center">

    <?php 

    if ($stmt->execute()) {
        echo "Atualização Salva";
        exit;
    } else {
        echo "Erro ao salvar.";
    }
}
    ?>

    </div>


<?php require_once 'rodape.php'; ?>
