<?php require_once 'auto_load.php';
require_once 'cabecalho.php'; ?>
   <div class="container"> <!-- Incluir lógica para envio ao banco de dados -->

       
   <?php
        $aluno = new aluno();
        
        $var = $aluno->AlunoEhAdministrador($_SESSION["email"]);

        if ($var == false) {     
            header('Location: painel-principal.php?mensagem=Você não possui acesso');
        }

    ?>
       
        
   <div class="row justify-content-center">
         
         <a href="gerenciar-turmas-listagem.php">
             <button type="button" class="btn btn-success btn-menu-principal">Gerenciar Turmas</button> 
         </a>


         <a href="turmas-criar.php">
             <button type="button" class="btn btn-success btn-menu-principal">Criar turma nova</button> 
         </a>
  </div>

   <div class="row justify-content-center">
         
         <a href="professor-criar.php">
             <button type="button" class="btn btn-success btn-menu-principal">Criar Professor</button> 
         </a>

         <a href="turma-mensagem-padrao.php">
             <button type="button" class="btn btn-success btn-menu-principal">Mensagem Padrão</button> 
         </a>
  </div>

  <div class="row justify-content-center">
         
         <a href="adm-atribuir.php">
             <button type="button" class="btn btn-success btn-menu-principal">Transformar Adm</button> 
         </a>

         <a href="#">
             <button type="button" class="btn btn-success btn-menu-principal"> (em desenv...)</button> 
         </a>
  </div>
  
  
            
        
    
        
    </div>    
    
<?php require_once 'rodape.php'; ?>
