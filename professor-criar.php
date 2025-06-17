<?php 
require_once 'auto_load.php';
require_once 'cabecalho.php';
?>
<div class="container">
    
    <p>Preencha os dados do professor:</p>

    <form action="professor-criar-post.php" method="post" id="cadastroProfessor">
       
        <input name="operacao" value="inserir" style="display: none;">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nome:</span>
            </div>
            <input type="text" required class="form-control" name="nome">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">E-mail:</span>
            </div>
            <input type="email" required class="form-control" name="email">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">CPF:</span>
            </div>
            <input type="text" required class="form-control" name="cpf">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Telefone:</span>
            </div>
            <input type="tel" required class="form-control" name="telefone">
        </div>

        <input class="btn btn-success" type="submit" name="submit" value="Enviar">    
    </form>
</div>

<?php require_once 'rodape.php'; ?>  
