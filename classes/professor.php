<?php

class professor {

private $id;
private $nome;


public function __get($valor){
    return $this->$valor;
}

public function __set($propriedade,$valor){
    $this->$propriedade = $valor;
}

 public function listar() {
    $query = "select * from professores";
    $conexao = Conexao::pegarConexao();
    $resultado = $conexao->query($query);
    $lista = $resultado->fetchAll();
    return $lista;
}


}

?>
