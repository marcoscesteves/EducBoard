<?php require 'classes/aluno.php';
header('Content-Type: text/html; charset=utf-8'); ?>

<p>Alunos cadastrados até o momento:</p>

<?php
    
$aluno = new Aluno();

$lista = $aluno->listar(); ?>

<ul>
<?php foreach ($lista as $linha) { ?>
<li>
<?php echo "Nome: $linha[nome] - Email: $linha[email] - CPF: $linha[cpf] - Telefone: $linha[telefone] "  ; ?>
</li>

<?php } ?>

</ul>

