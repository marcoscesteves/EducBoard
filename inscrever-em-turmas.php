<?php require 'auto_load.php';
$titulo = 'Inscrições em Turmas';
require_once 'cabecalho.php';
 ?>

    <div class="container">
        <p> <?php echo $_SESSION['nome'] ?>, escolha uma turma para inscrever-se: </p>
        
        
        <?php $turma = new turma(); 
        $lista = $turma->listar(); ?>

        <table class="table table-bordered tabela-centrada-e-margem-inf tabela-com-itens-centrados">
            <thead>
                <tr class="table-success align-items-center">
                    <td style="display: none;">Código da Turma</td>
                    <td>Data</td>
                    <td>Horário</td>
                    <td colspan="2">Vagas Disp.</td>
                </tr>
            </thead>
            <tbody>
               <?php foreach ($lista as $linha) : ?>
                <tr class="table-success align-items-center">
                 <td style="display: none;"><?php echo $linha['id'] ?></td>
                 <td><?php echo $linha['data'] ?></td> 
                 <td><?php echo $linha['horario'] ?></td>
                 <td><?php echo ($linha['vagasmax'] - $turma->quantidadeDeAlunosIncritos($linha['id'])) ?></td>
                 <td class="tdEspecifico tdEspecifico-incluir"><a href="confirmar-inscricao-aluno.php?turma_id=<?php echo $linha['id']?>"><button class="btn btn-opcoes btn-excluir"><i class="far fa-check-circle fa-2x text-light"></i></button></a></td>
                </tr>
               <?php endforeach ?>     
            </tbody>
        </table>
       
    </div>
        
<?php require_once 'rodape.php'; ?>    
