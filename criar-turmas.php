<?php require_once 'auto_load.php';
$titulo = 'Gerenciar Turmas';
require_once 'cabecalho.php'; ?>
   <div class="container"> <!-- Incluir lógica para envio ao banco de dados -->
       
        <p>Preencha os dados abaixo:</p>
        
    <form action = "turma-criar-post.php" method="post" id="cadastroTurma">
        

            
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Data:</span>
            </div>
            <input type="date" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="data" >
        </div>

        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Horário: </span>
                </div>
            <input type="time" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="horario" required="required">
        </div>

        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Local: </span>
                </div>
            <input type="text" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="local">
        </div>
            
	  <div class="input-group mb-3">
            <div class="input-group-prepend">
               <label class="input-group-text" for="inputGroupSelect01">Professores</label>
            </div>
            <select class="custom-select" form="cadastroTurma" multiple="multiple" name="professores[]"  id="inputGroupSelect01">
                <?php $professor = new professor();
		$lista  = $professor->listar(); ?>

		<?php foreach ($lista as $linha) : ?>
	        <option selected><?= $linha['nome'] ?></option>
            	<?php endforeach ?>
		</select>

        </div>        
       
        <input class="btn btn-success" type="submit" name="submit" value="Enviar" />    
        
    </form>
    
        
    </div>    
    
<?php require_once 'rodape.php'; ?>
