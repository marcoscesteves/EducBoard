<?php require_once 'classes/conexao.php';
require 'auto_load.php';
//session_start();
header('Content-type: text/html; charset=UTF-8');

class Turma {
private $id;
private $data;
private $horario;
private $vagasmax;
private $local;
private $professor1;
private $professor2;
private $professor3;

public function __get($atributo){

    return $this->$atributo;
}

public function __set($atributo, $valor){
    
    $this->$atributo=$valor;
    
}

    
 public function listar() {
    /*
    Lista todas as turmas cadastradas
    */
    //$query = "select id, trim(DATE_FORMAT(data,'%d/%m/%Y')) as data, horario, local, vagasmax from turma order by data";
    $query = "select t.id, DATE_FORMAT(t.data,'%d/%m/%Y') as data, t.horario, t.local, t.vagasmax FROM "
         . " (                                                                                         "
	     . "    select id, data, horario, local, vagasmax from turma order by data                     "
         . " ) t                                                                                       ";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
}

public function listarUltimaTurmaCadastrada() {

    $query = "select * from ( select id, trim(DATE_FORMAT(data,'%d/%m/%Y')) as data, horario, local, vagasmax from turma order by id desc ) tab limit 1";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetch();
    //var_dump($lista);
    return $lista;
}
    
public function listarDadosDeTurmaPorId($id) {
    $query = "select id, trim(DATE_FORMAT(data,'%d/%m/%Y')) as data, horario, local, vagasmax from turma where id = " . $id;
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetch();
    return $lista;
}
 
    
public function AlunoJaEstaInscritoNaTurma($aluno_id, $turma_id) {
    $query = "SELECT COUNT(*) as qtde FROM vinculo_turma_alunos v join turma t on v.turma_id = t.id and aluno_id = ". $aluno_id . " and turma_id = " . $turma_id;
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $linha = $resultado->fetch();
    if ($linha['qtde'] > 0) {
        return true;  
    } else {
        return false;
    }
}


public function inserirProfessorEmTurma($turma_id, $professor_nome){

$query = "SELECT * FROM professores where nome = '$professor_nome' ";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    //var_dump($conexao->errorInfo());
    $linha = $resultado->fetch();
    
	
	$query = "insert into vinculo_turma_professor (turma_id, professor_id) values (:turma, :professor) ";
        $conexao = Conexao::pegarConexao();
        $conexao->exec("SET CHARACTER SET utf8");
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':turma', $turma_id);
        $stmt->bindValue(':professor', $linha['id']);
        $stmt->execute();
        return true;

}

public function ExcluirTurma($turma_id){

            
        $query = "delete FROM vinculo_turma_alunos WHERE turma_id = :turma;  
                  delete FROM vinculo_turma_professor WHERE turma_id = :turma;
                  delete FROM turma WHERE id = :turma ";
            $conexao = Conexao::pegarConexao();
            $conexao->exec("SET CHARACTER SET utf8");
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(':turma', $turma_id);
            $stmt->execute();
            return true;
    
    }
    
   
public function inscreverAlunoEmTurma($aluno_id) {
          
    if ( $this->AlunoJaEstaInscritoNaTurma($aluno_id, $this->id) ) {
         $_SESSION['inscricao'] = 'Prezado(a) Aluno(a), você já inscrito nesta turma!';
        return false; 
    } else if ($this->AlunoAtingiuLimiteDeInscricoes($aluno_id) ) {
        $_SESSION['inscricao'] = 'Prezado(a) Aluno(a), você atingiu o limite de 4 inscrições!';
        return false;
    } else if ($this->quantidadeDeAlunosIncritos($this->id) >= 3 ) {
        $_SESSION['inscricao'] = 'Prezado(a) Aluno(a), esta turma está lotada! Por favor, escolha outra data ou horário.';
        return false; 
    } else if ($this->EhPedidoDeInscricaoParaOMesmoDia($aluno_id, $this->id)) {
        $_SESSION['inscricao'] = 'Prezado(a) Aluno(a), não é possível inscrever-se em mais de uma turma para o mesmo dia! Por favor, escolha outra data.';
        return false; 
        
    } else {
        $query = "insert into vinculo_turma_alunos (aluno_id,turma_id) values (:aluno, :turma) ";
        $conexao = Conexao::pegarConexao();
        $conexao->exec("SET CHARACTER SET utf8");
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':aluno', $aluno_id);
        $stmt->bindValue(':turma', $this->id);
        $stmt->execute(); 
        return true;
    }
    
    
}
    
private function AlunoAtingiuLimiteDeInscricoes($aluno_id){
    $query = "select count(*) as qtde from vinculo_turma_alunos where aluno_id = ". $aluno_id;
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $linha = $resultado->fetch();
    if ($linha['qtde'] >= 4) {
        return true;  
    } else {
        return false;
    }
    
    
}

    
private function EhPedidoDeInscricaoParaOMesmoDia($aluno_id, $turma_id){
    
    $turmaRecebida = $this->listarDadosDeTurmaPorId($turma_id);
    $query = "SELECT COUNT(*) as qtde FROM vinculo_turma_alunos v join turma t on v.turma_id = t.id 
    where DATE_FORMAT(t.data,'%d/%m/%Y') = '" . $turmaRecebida['data'] . "' and aluno_id = " . $aluno_id;
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $linha = $resultado->fetch();
    if ($linha['qtde'] > 0) {
        return true;  
    } else {
        return false;
    }
    
} 
    

public function retirarAlunoDeTurma(){
    $query = "delete from vinculo_turma_alunos where aluno_id = :aluno and turma_id = :turma ";
        $conexao = Conexao::pegarConexao();
        $conexao->exec("SET CHARACTER SET utf8");
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':aluno', $_SESSION["id"]);
        $stmt->bindValue(':turma', $this->id);
        $stmt->execute(); 
   
}
    
public function quantidadeDeAlunosIncritos($turma_id){
    $query = "select count(*) as qtde from vinculo_turma_alunos where turma_id = " . $turma_id;
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $linha = $resultado->fetch();
    return $linha['qtde'];
}
    
    
public function inserir(){
    $conexao = Conexao::pegarConexao();
    $conexao->exec("SET CHARACTER SET utf8");
    $query = "INSERT INTO turma (data,horario,vagasmax,local) VALUES (:data,:horario,3,:local)";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':data', $this->data);
    $stmt->bindValue(':horario', $this->horario);
    $stmt->bindValue(':local', $this->local);
    $stmt->execute();

    $turmaCadastrada = $this->listarUltimaTurmaCadastrada();

    // Inserir professor na turma
    if (isset($this->professor1)) {                            
    	$this->inserirProfessorEmTurma($turmaCadastrada['id'], $this->professor1);
    }

    if (isset($this->professor2)) {
        $this->inserirProfessorEmTurma($turmaCadastrada['id'], $this->professor2);
    }

    if (isset($this->professor3)) {
        $this->inserirProfessorEmTurma($turmaCadastrada['id'], $this->professor3);
    }

    
    //echo "Turma criada com sucesso!";
    return "Turma criada com sucesso!";


}

public function listarAlunosInscritosEmTurma($turma_id){
    $query = "SELECT t.data as data, t.horario as horario, a.nome as nome, a.email as email, a.telefone as telefone 
              FROM vinculo_turma_alunos vta
              join turma t on vta.turma_id = t.id 
              join alunos a on vta.aluno_id = a.id
              where t.id = ". $turma_id;
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $linha = $resultado->fetchAll();
    return $linha;      
}
    
}


?>
