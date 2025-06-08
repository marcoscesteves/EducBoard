<?php require_once 'classes/conexao.php';
require 'auto_load.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset = utf-8');

class Aluno {

private $id;
private $nome;
private $email;
private $cpf;
private $telefone;
private $profissao;
private $curso;
private $periodo;
private $administrador;
private $senha;

public function __get($valor){
    return $this->$valor;
}
    
public function __set($propriedade,$valor){
    $this->$propriedade = $valor;
}
    
public function acessar($v_email, $v_senha) {
    $query = "select * from alunos where email = '" . $v_email . "' limit 1 ";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $validaLista = $resultado->fetch();
    
    // password_hash($senha_recebida, PASSWORD_DEFAULT)
    //if ( password_hash(trim($v_senha), PASSWORD_DEFAULT) == trim($validaLista['senha']) ) { 
    if ( base64_encode(trim($v_senha)) == $validaLista['senha'] ) { 
    //if ( password_verify($v_senha, $validaLista['senha']) ) {
        return true; 
    } else {
        return false;
    }
}
    
public function listar(){
    $query = "SELECT nome, email, cpf, telefone FROM alunos";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
}
    
private function validarAcesso() { 
    return $senha;
}
    
public function buscarAluno($v_email) {
    $query = "SELECT * FROM alunos where email = '". $v_email . "'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $alunoResult = $resultado->fetch();
    return $alunoResult;
}

public function AlunoEhAdministrador($v_email) {
    $query = "SELECT * FROM alunos where email = '". $v_email . "'";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $alunoResult = $resultado->fetch();
    
    /*echo var_dump($alunoResult);
    echo var_dump($alunoResult['gerenciador']);
    */
    if ( $alunoResult['administrador'] == 1 ) { 
            return true; 
        } else {
            return false;
        }
}

    
public function alterarSenhaDoAluno($v_email, $v_senha) {
    $conexao = Conexao::pegarConexao();
    $conexao->exec("SET CHARACTER SET utf8");
    $query = "update alunos set senha = :senha where email = :email ";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':email', $v_email);
    $stmt->bindValue(':senha', base64_encode(trim($v_senha)) );
    $stmt->execute();
    
}
    

    
    
public function inserir(){
    $conexao = Conexao::pegarConexao();
    $conexao->exec("SET CHARACTER SET utf8");
    $query = "INSERT INTO alunos (nome,email,cpf,telefone,profissao,curso,periodo,senha) VALUES (:nome,:email,:cpf,:telefone,:profissao,:curso,:periodo,:senha)";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':email', $this->email);
    $stmt->bindValue(':cpf', $this->cpf);
    $stmt->bindValue(':telefone', $this->telefone);
    $stmt->bindValue(':profissao', $this->profissao);
    $stmt->bindValue(':curso', $this->curso);
    $stmt->bindValue(':periodo', $this->periodo);
    $stmt->bindValue(':senha', $this->senha);
    $stmt->execute();

}
    
    public function atualizar(){
    $conexao = Conexao::pegarConexao();
    $conexao->exec("SET CHARACTER SET utf8");
    $query = "update alunos set nome = :nome, cpf = :cpf, telefone = :telefone, profissao = :profissao, curso = :curso, periodo = :periodo, senha = :senha where email = :email"; 
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':email', $this->email);
    $stmt->bindValue(':cpf', $this->cpf);
    $stmt->bindValue(':telefone', $this->telefone);
    $stmt->bindValue(':profissao', $this->profissao);
    $stmt->bindValue(':curso', $this->curso);
    $stmt->bindValue(':periodo', $this->periodo);
    $stmt->bindValue(':senha', $this->senha);
    $stmt->execute();
        
    }

    
public function listarTurmasEmQueAlunoEstaInscrito($aluno_id){
    $query = "select v.aluno_id, v.turma_id, trim(DATE_FORMAT(t.data,'%d/%m/%Y')) as data, t.horario, t.id from vinculo_turma_alunos v join turma t on v.turma_id = t.id where aluno_id = ". $aluno_id . " order by data";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $linha = $resultado->fetchAll();
    return $linha;    
}


}

?>