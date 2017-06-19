<?php

class ConnectionDB extends PDO {
    private static $instance = null;
    
    public function ConnectionDB($dsn, $usuario, $senha)
    {
        parent::__construct($dsn, $usuario, $senha);
    }
    public static function getInstance()
    {
        if(!isset(self::$instance))
        {
            try {
                self::$instance = new ConnectionDB("mysql:dbname=qualidade_teste;host=localhost","root","");
            } catch (Exception $ex) {
                echo "Falha na conexão com o banco de dados: $ex";
                exit();
            }
        }
        return self::$instance;
    }
}

?>