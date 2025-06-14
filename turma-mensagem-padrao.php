<?php require_once 'auto_load.php';
require_once 'classes/conexao.php'; // use seu arquivo padrão de conexão
$titulo = 'Editar texto padrão para inscrições';
require_once 'cabecalho.php';


// Busca valor atual (se existir)
$conexao = Conexao::pegarConexao();
$sql = "SELECT valor FROM configuracoes WHERE chave = 'texto_padrao_para_inscricoes' LIMIT 1";
$stmt = $conexao->query($sql);
$linha = $stmt->fetch(PDO::FETCH_ASSOC);
$textoAtual = $linha ? $linha['valor'] : '';
?>

<!--
<div class="row justify-content-center">

<form action="configuracoes-salvar.php" method="post">
    <label for="valor">Texto padrão que aparece em todas as confirmações de inscrições:</label><br>
    <textarea name="valor" id="valor" rows="15" cols="80"><?= htmlspecialchars($textoAtual) ?></textarea><br><br>
    <button class="btn btn-success" type="submit" name="submit" value="Enviar">Salvar</button>
</form>

</div>

-->

<div class="container mt-4">
   

    <form id="formConfig" method="post">
        <div class="mb-3">
            <label for="valor" class="form-label">Texto padrão que será ofererecido ao aluno antes de confirmar sua inscrição.</label>
            <textarea name="valor" id="valor" class="form-control" rows="10"><?= htmlspecialchars($textoAtual) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-success" id="btnSalvar">Salvar</button>
        <span class="text-success ms-3 d-none" id="msgSucesso">Atualização salva</span>
    </form>
</div>

<script>
document.getElementById('formConfig').addEventListener('submit', async function(e) {
    e.preventDefault();

    const btn = document.getElementById('btnSalvar');
    const msg = document.getElementById('msgSucesso');
    const valor = document.getElementById('valor');

    const formData = new FormData();
    formData.append('valor', valor.value);

    const resposta = await fetch('configuracoes-salvar.php', {
        method: 'POST',
        body: formData
    });

    if (resposta.ok) {
        // Desativa o textarea e muda cor de fundo
        valor.setAttribute('readonly', true);
        valor.classList.add('bg-light');

        // Oculta botão e mostra mensagem
        btn.classList.add('d-none');
        msg.classList.remove('d-none');
    }
});
</script>

<?php require_once 'rodape.php'; ?>
