<?php require 'auto_load.php';
require_once 'cabecalho.php';
 ?>

    <div class="container">
        <p> Lista de presença </p>
        
        
        <?php $turma = new turma(); 

        
        $lista = $turma->listarAlunosInscritosEmTurma($_GET["turma_id"]); ?>

        
        <table class="table table-bordered tabela-centrada-e-margem-inf tabela-com-itens-centrados">
            <thead>
                <tr class="table-success align-items-center">
                    <td> Nome:</td>
                    <td> Email: </td>
                    <td> Telefone: </td>
                    <td> Assinatura:</td>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($lista as $linha) : ?>
                <tr class="table-success align-items-center">
                 <td><?php echo $linha['nome'] ?></td>
                 <td><?php echo $linha['email'] ?></td> 
                 <td><?php echo $linha['telefone'] ?></td>
                 <td></td>
                 </tr>
               <?php endforeach ?>     
            </tbody>
        </table>
       
    </div>
        
<?php require_once 'rodape.php'; ?>    
