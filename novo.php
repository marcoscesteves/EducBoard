<?php 
require_once 'auto_load.php';
require_once 'cabecalho.php';
?>
   <div class="container"> <!-- Incluir lógica para envio ao banco de dados -->
       
        <p>Preencha os dados abaixo:</p>
        
        <p class="aviso-simples">As informações abaixo são importantes para gerarmos o seu certificado ao término do curso.</p>
        
    <form action = "alunos-criar-post.php" method="post" id="cadastroAluno">
       
        <input name="operacao" value="inserir" style="display: none;">
        
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nome:</span>
                </div>
            <input type="text" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="nome" >
        </div>

        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">E-mail: </span>
                </div>
            <input type="email" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="email" required="required">
        </div>

        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">CPF: </span>
                </div>
            <input type="text" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="cpf">
        </div>
        
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Telefone: </span>
                </div>
            <input type="tel" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="telefone">
        </div>

        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Profissão</label>
            </div>
            <select class="custom-select" name="profissao" form="cadastroAluno" id="inputGroupSelect01">
                <option selected>Escolha...</option>
                <option value="Estudante">Estudante</option>
                <option value="Professor">Professor</option>
                <option value="Trabalho no comércio">Trabalho no comércio</option>
                <option value="Trabalho na Indústria">Trabalho na Indústria</option>
                <option value="Outro">Outro</option>
            </select> 
            
        </div>
        
        <div class="input-group mb-3 DesabilitarInputEstudantes">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Curso: </span>
                </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="curso">
        </div>
        
        <div class="input-group mb-3 DesabilitarInputEstudantes">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Período: </span>
                </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="periodo">
        </div>
        
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
         
        var divsSelecionadas = document.querySelectorAll(".DesabilitarInputEstudantes");
        
        if (get_val === 'Estudante') {
            
            for(var i = 0; i < divsSelecionadas.length ; i++){
                divsSelecionadas[i].style.display = "inline-flex";
            }
            
        } else {
             for(var i = 0; i < divsSelecionadas.length ; i++){
                divsSelecionadas[i].style.display = "none";
            }
            
        }
        
        
        
    });
    
</script> 

</body>
</html>