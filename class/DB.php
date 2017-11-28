<?php

class DB {
    
    private $pdo;
    
    private static $instance;
      
    private function __construct() {
        
        try {
            $pdo = new PDO(Config::$db_type . ":dbname=" . Config::$db_name . ";host=" . Config::$db_host, Config::$db_user, Config::$db_pass, 
                    [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo = $pdo;
        } catch (PDOException $e) {
            echo 'DB Error';
        }
    }

    public static function getConnection() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }            
}

