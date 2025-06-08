<?php 
require_once 'auto_load.php';
$titulo = 'Novas Inscrições';
require_once 'cabecalho.php';
$aluno = new aluno(); 
$lista = $aluno->buscarAluno($_SESSION["email"]); 
$pagina_referencia = "meus-dados.php";

?>
   <div class="container"> <!-- Incluir lógica para envio ao banco de dados -->
        
        <p class="aviso-simples">As informações abaixo são importantes para gerarmos o seu certificado ao término do curso.</p>
        
    <form action = "alunos-criar-post.php" method="post" id="cadastroAluno">
       
    <input name="operacao" value="atualizar" style="display: none;">
       
        
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                </div>
            <input type="text" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="nome" value="<?php echo $lista['nome']; ?>">
        </div>
        
        

        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">E-mail: </span>
                </div>
            <input type="email" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="email" required="required" readonly
            value="<?php echo $lista['email']; ?>">
        </div>

        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">CPF: </span>
                </div>
            <input type="text" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="cpf" 
            value="<?php echo $lista['cpf']; ?>">
        </div>
        
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Telefone: </span>
                </div>
            <input type="tel" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="telefone" 
            value="<?php echo $lista['telefone']; ?>">
        </div>

        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Profissão</label>
            </div>
            <select class="custom-select" name="profissao" form="cadastroAluno" id="inputGroupSelect01">
                <option value="Estudante" <?= $lista['profissao'] == 'Estudante' ? ' selected="selected"' : '';?> >Estudante</option>
                <option value="Professor" <?= $lista['profissao'] == 'Professor' ? ' selected="selected"' : '';?> >Professor</option>
                <option value="Trabalho no comércio" <?= $lista['profissao'] == 'Trabalho no comércio' ? ' selected="selected"' : '';?> >Trabalho no comércio</option>
                <option value="Trabalho na Indústria" <?= $lista['profissao'] == 'Trabalho na Indústria' ? ' selected="selected"' : '';?> >Trabalho na Indústria</option>
                <option value="Outro" <?= $lista['profissao'] == 'Outro' ? ' selected="selected"' : '';?> >Outro</option>
            </select> 
            
        </div>
        
        <?php if ($lista['profissao'] == 'Estudante') { ?>
        
        
        <div class="input-group mb-3 InputEstudantes">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Curso: </span>
                </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="curso"
            value="<?php echo $lista['curso']; ?>">
        </div>
        
        <div class="input-group mb-3 InputEstudantes">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Período: </span>
                </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="periodo"
            value="<?php echo $lista['periodo']; ?>">
        </div>
        
        
        <?php } ?>
        
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Senha: </span>
                </div>
            <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="senha"> 
        </div>
        
       
        <input class="btn btn-success" type="submit" name="submit" value="Enviar" />    
        
    </form>
    
        
    </div> 
<?php require_once 'rodape.php'; ?>  

<script>
    var botaoAcionador = document.querySelector("#inputGroupSelect01");
    botaoAcionador.addEventListener("change", function(event) {
        
        var get_val = event.target.selectedOptions[0].getAttribute("value");
         
        var divsSelecionadas = document.querySelectorAll(".InputEstudantes");
        
        if (get_val === 'Estudante') {
            
            for(var i = 0; i < divsSelecionadas.length ; i++){
                divsSelecionadas[i].style.display = "inline-flex";
            }
            
        } else {
             for(var i = 0; i < divsSelecionadas.length ; i++){
                divsSelecionadas[i].style.display = "none";
            }
            
        }
        
        
        //console.log(document.querySelector(".custom-select").textContent);
        
    });
    
</script> 

</body>
</html>