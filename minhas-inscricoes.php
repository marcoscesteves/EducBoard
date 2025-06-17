<?php require 'auto_load.php';
require_once 'cabecalho.php'; ?>
  
   <div class="container">
   
   <?php $turma = new turma(); 
    $aluno = new aluno();
    $aluno->id = $_SESSION['id'];   
                     
    $lista = $aluno->listarTurmasEmQueAlunoEstaInscrito($aluno->id); ?>
    
    <?php if (count($lista) > 0) { ?>
   
    <p> <?php echo $_SESSION['nome'] ?>, abaixo estão as suas inscrições: </p>
        
    <table class="table table-bordered tabela-centrada-e-margem-inf tabela-com-itens-centrados">
        <thead>
            <tr class="table-success align-items-center">
                <td style="display: none;">Código da Turma</td>
                <td>Data</td>
                <td colspan="2">Horário</td>
                
            </tr>
        </thead>
        <tbody>
           <?php foreach ($lista as $linha) : ?>
            <tr class="table-success align-items-center">
             <td style="display: none;"><?php echo $linha['id'] ?></td>
             <td><?php echo $linha['data'] ?></td> 
                <td><?php echo $linha['horario'] ?></td>
               <td class="tdEspecifico tdEspecifico-excluir"> <a href="excluir-inscricao.php?turmaid=<?php echo $linha['id'] ?>"> <button class="btn btn-danger btn-sm btn-excluir"><i class="fas fa-trash fa-2x"></i></button></a>
                </td> 
            </tr>
           <?php endforeach ?>  
              
        </tbody>
    </table>
           
    <?php } else { echo "Você ainda não realizou inscrições."; } ?>
            
       
    </div>
<?php require_once 'rodape.php'; ?>