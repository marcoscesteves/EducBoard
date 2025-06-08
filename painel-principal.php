<?php require 'auto_load.php'; 
$titulo = 'Painel Principal';
require_once 'cabecalho.php' ?>

   
    <div class="container">
        <h3 class="text-center">Seja bem-vindo, <?php echo $_SESSION['nome'] ?>! </h3>
        
        <?php if (isset($_SESSION['mensagem'])) { ?>
            
            <div class="row justify-content-center">

                <div class="alert alert-success">
                    <p><?= $_SESSION['mensagem'] ?> </p>
                </div>
            </div>

            <?php unset($_SESSION['mensagem']);  

        } ?> 


        <div class="row justify-content-center">
         
               <a href="minhas-inscricoes.php">
                   <button type="button" class="btn btn-success btn-menu-principal">Aulas agendadas</button> 
               </a>


               <a href="inscrever-em-turmas.php">
                   <button type="button" class="btn btn-success btn-menu-principal">Agendar aulas</button> 
               </a>
        </div>
        
        <div class="row justify-content-center">

               <a href="meus-dados.php">
                   <button type="button" class="btn btn-success btn-menu-principal">Dados Pessoais</button> 
               </a>

            
               <a href="gerenciar-turmas.php">
                   <button type="button" class="btn btn-success btn-menu-principal">Gerenciar turmas</button> 
               </a>
        </div>
        
    
    </div>
    
 
<?php require_once 'rodape.php'; ?>