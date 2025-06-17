<?php require 'auto_load.php'; 
require_once 'classes/conexao.php';
require_once 'cabecalho.php' ?>

   
    <div class="container">
        <h3 class="text-center">Atenção as regras para sua inscrição!</h3>


        <div class="row justify-content-center">
        <!--    <ul>
                <li>Cada aula tem 45 minutos de duração.</li>
                <li>Cada aluno terá direito a no máximo 4 aulas durante todo o curso, sendo as mesmas em dias distintos. </li> 
                <li>Cada pessoa poderá marcar apenas um horário por dia.</li>       
                <li>No máximo três alunos por horário, porque temos apenas três telescópios e três intrutores disponíveis.</li>
                <li>Procurem ser pontuais!</li>
                <li>Até o final das quatro aulas pretendemos que cada aluno consiga localizar 
                    sozinho os seguintes objetos astronômicos: Lua, planetas (Júpiter, Saturno, 
                    Marte e Vênus), aglomerados abertos, aglomerados globulares, nebulosas e 
                    sistemas múltiplos de estrelas.</li>
                <li>É de suma importância que <strong>antes das aulas</strong> os alunos instalem no celular o aplicativo Stellarium (ou similar)</li>
                <li>No final do curso os instrutores avaliarão os alunos no empenho em tentar aprender, 
                    e na velocidade em que localiza os objetos astronômicos. </li>
                <li>As aulas do COAstro ocorrerão no Centro Multidisciplinar da UFRJ, em frente ao bloco C,
                    que fica localizado logo em frente ao Shopping Plaza Macaé.</li>
                <li>Caso a pessoa agendar a aula e próximo do horário da aula não poder ir, por favor, 
                    avise, porque tentaremos arranjar um substituto.</li>
                <li>Caso tenha interesse em ser membro do CACrux, e ser um dos instrutores do 
                    COAstro, contate-nos por e-mail: clubedeastronomiacrux@gmail.com. </li>
                <li>Curta a página do clube no Instagram: @clubedeastronomiacrux. </li>
                <li>O coordenador do COAstro é o Prof. Dr. Luis Juracy Rangel Lemos. </li>
            </ul>

            -->

            <?php
            $query = "SELECT valor FROM configuracoes where chave = 'texto_padrao_para_inscricoes' ";
            $conexao = Conexao::pegarConexao();
            $resultado = $conexao->query($query);

            $linhas = [];

            if ($resultado) {
                $linha = $resultado->fetch(PDO::FETCH_ASSOC);
                if ($linha && isset($linha['valor'])) {
                    $linhas = preg_split('/\r\n|\r|\n/', $linha['valor']);
                }
            }
            ?>

            <ul>
                <?php foreach ($linhas as $linha): ?>
                    <?php if (trim($linha) !== ''): ?>
                        <li><?= $linha ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>


             <?php $turma = new turma();
             $turma->id = $_GET['turma_id'];
             $linha = $turma->listarDadosDeTurmaPorId($turma->id); ?>
        
        </div>
        
                       
        <?php if (isset($_SESSION['inscricao'])) { ?>
            
            <div class="row justify-content-center">

                <div class="alert alert-success">
                    <p><?= $_SESSION['inscricao'] ?> </p>
                </div>
            </div>

            <?php unset($_SESSION['inscricao']);  

        } else {    ?> 
                
            <div class="row justify-content-center">
                <p>Você confirma sua inscrição para a turma: <?php echo $linha['data'] ?> - <?php echo $linha['horario'] ?> ? </p> 
            </div>   
            <div class="row justify-content-center">
                <a href="turma-inscricao-post.php?turma_id=<?php echo $turma->id ?>" ><button class="btn btn-success">Confirmar</button></a>

            <a href="inscrever-em-turmas.php" ><button class="btn btn-success">Cancelar</button></a>
            </div>

        <?php } ?>
    </div>

    
 
<?php require_once 'rodape.php'; ?>