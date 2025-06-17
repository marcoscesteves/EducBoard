<?php 
require_once 'auto_load.php';
require_once 'cabecalho.php';
?>

   <div class="container">
        
       <?php if (isset($_SESSION['mensagem'])) { ?>
            
            <div class="row justify-content-center">

                <div class="alert alert-success">
                    <p><?= $_SESSION['mensagem'] ?> </p>
                </div>
            </div>

            <?php unset($_SESSION['mensagem']);  

        } ?> 
   
       <div class="row justify-content-center">
           <h1>Seja bem-vindo</h1>
       </div>  
      
       <div class="row justify-content-center">
       
           <form action = "alunos-acesso.php" method="post" id="AcessoAluno">
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">E-mail: </span>
                   </div>
                   <input type="email" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="email">
               </div>
               <div class="input-group mb-3">
                   <div class="input-group-prepend">
                       <span class="input-group-text" id="inputGroup-sizing-default">Senha: </span>
                   </div>

                   <input type="password" required class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="senha">

                   <input class="btn btn-success" type="submit" name="submit" value="Acessar" /> 
               </div>   

           </form>  
           
               
           
       </div>
       
       <?php if (isset($_GET['erro'])) { ?>
    
             <div class="alert alert-danger">
                <?php echo 'Usuário ou senha inválido.'?> 
             </div>
    
            <?php } ?>   
            
        <?php if (isset($_GET['aviso'])) { ?>
    
             <div class="alert alert-success">
                <?php echo 'A sua nova senha foi enviada para o e-mail cadastrado !'?> 
             </div>
    
            <?php } ?>   
       
       <div class="row justify-content-center">
          

           <a href="esqueci-senha.php">
           <button type="button" class="btn btn-secondary">Esqueci minha senha</button> 
           </a>
           <a href="novo.php">
               <button type="button" class="btn btn-warning" >Novo Aluno
               </button>
           </a>
           
       </div>

   </div>
   
   </body>
</html>
