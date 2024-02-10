<?php

namespace src\connection;

class Mysql {

    public static $instance;

    public $schema = '';
  
    public static function getConexao() {
    
        if (!isset(self::$instance)) {
            self::$instance = new \PDO("mysql:host=".DB['HOST'].";dbname=".DB['DBNAME'], DB['USER'], DB['PASS']);
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_EMPTY_STRING);
        
        }
        
        return self::$instance;
    }

    
}