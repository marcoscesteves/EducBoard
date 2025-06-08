<?php

Class Conexao {
    
    public static function pegarConexao(){
        $conexao = new PDO('mysql:host=localhost;dbname=crux','root', '');
        return $conexao;
    }
}


?>