<?php require 'auto_load.php';
require_once 'cabecalho.php';
 ?>

    <div class="container">
        <p> <?php echo $_SESSION['nome'] ?>, selecione uma turma para ter os dados alterados: </p>
        
        
        <?php $turma = new turma(); 

        
        
        if (ISSET($_GET['turma_id_exclusao'])) { 
        
            $turma->ExcluirTurma($_GET['turma_id_exclusao']);
            
        }  

        
        $lista = $turma->listar(); ?>

        <table class="table table-bordered tabela-centrada-e-margem-inf tabela-com-itens-centrados">
            <thead>
                <tr class="table-success align-items-center">
                    <td style="display: none;">Código da Turma</td>
                    <td>Data</td>
                    <td>Horário</td>
                    <td colspan="4">Vagas Disp.</td>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($lista as $linha) : ?>
                <tr class="table-success align-items-center">
                 <td style="display: none;"><?php echo $linha['id'] ?></td>
                 <td><?php echo $linha['data'] ?></td> 
                 <td><?php echo $linha['horario'] ?></td>
                 <td><?php echo ($linha['vagasmax'] - $turma->quantidadeDeAlunosIncritos($linha['id'])) ?></td>
                 <td class="tdEspecifico tdEspecifico-incluir"><a href="lista-de-presenca.php?turma_id=<?php echo $linha['id']?>"*/><button class="btn btn-opcoes btn-excluir"><i class="fal fa-clipboard-list fa-2x text-light"></i></button></a></td>
                 
                 <td class="tdEspecifico tdEspecifico-incluir"><a onclick="alert ('Opção em desenvolvimento!')"><button class="btn btn-opcoes btn-excluir"><i class="fas fa-pen fa-2x text-light"></i></button></a></td>
                 <td class="tdEspecifico tdEspecifico-incluir"><a href="gerenciar-turmas-listagem.php?turma_id_exclusao=<?php echo $linha['id']?>" onclick="return confirm('Você tem certeza que deseja excluir ?')"><button class="btn btn-opcoes btn-excluir"><i class="fas fa-trash fa-2x text-light"></i></button></a></td>
                </tr>
               <?php endforeach ?>     
            </tbody>
        </table>
       
    </div>
        
<?php require_once 'rodape.php'; ?>    
