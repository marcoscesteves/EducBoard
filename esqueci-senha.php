<?php 
require_once 'auto_load.php';
require_once 'cabecalho.php';
?>
   <div class="container">

    <p>Para recuperar sua senha, favor inserir o e-mail abaixo:</p>      
       
       
        <form action = "esqueci-senha-post.php" method="post" id="AcessoAluno">
            <input name = "operacao" value="nova-senha" style="display: none;"> 
		    <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">E-mail: </span>
                </div>
                <input type="email" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="email">
                   
                <input class="btn btn-success" type="submit" name="submit" value="Enviar nova senha" /> 
            </div>
            
        </form>  

       
       
    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'email-nao-encontrado') { ?>
        <div class="alert alert-danger">
            Prezado usuário, o e-mail cadastrado não consta em nossa base de dados.
        </div>
    <?php } ?>

       
       <div class="row justify-content-center">
          
           
       </div>

   </div>
   
   
    
    <?php require_once 'rodape.php'; ?>
   </body>
</html>
