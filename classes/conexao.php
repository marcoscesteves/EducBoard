<?php

class Conexao {

    public static function pegarConexao() {
        // Array de configurações
        $config = require __DIR__ . '/../config/config.php';
        $db = $config['database'];

        // Conexão a partir do array importado acima
        $dsn = "mysql:host={$db['host']};port={$db['port']};dbname={$db['name']};charset={$db['charset']}";

        try {
            $conexao = new PDO($dsn, $db['user'], $db['password']);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexao;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}


?>