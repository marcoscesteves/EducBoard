<?php

class professor {

    private $id;
    private $nome;
    private $email;
    private $cpf;
    private $telefone;
    

    public function __get($valor) {
        return $this->$valor;
    }

    public function __set($propriedade, $valor) {
        $this->$propriedade = $valor;
    }

    public function listar() {
        $query = "SELECT * FROM professores";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        return $resultado->fetchAll();
    }

    /*
    public function inserir() {
        $conexao = Conexao::pegarConexao();
        $query = "INSERT INTO professores (nome, cpf, telefone, email) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($query);
        $stmt->execute([$this->nome, $this->cpf, $this->telefone, $this->email]);

        return "Professor {$this->nome} cadastrado com sucesso!";
    }
        */


    public function inserir(){
    $conexao = Conexao::pegarConexao();
    $conexao->exec("SET CHARACTER SET utf8");
    $query = "INSERT INTO professores (nome,email,cpf,telefone) VALUES (:nome,:email,:cpf,:telefone)";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':email', $this->email);
    $stmt->bindValue(':cpf', $this->cpf);
    $stmt->bindValue(':telefone', $this->telefone);
    $stmt->execute();

    return "Professor {$this->nome} cadastrado com sucesso!";
    }    

}
?>
