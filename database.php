<?php
class Database {
    private static $dbName = 'hackaton_2024'; //CAMBIAR EL DATO AL SERVIDOR DESEADO
    private static $dbHost = 'localhost' ; //CAMBIAR EL DATO AL SERVIDOR DESEADO
    private static $dbUsername = 'root'; //CAMBIAR EL DATO AL SERVIDOR DESEADO
    private static $dbUserPassword = ''; //CAMBIAR EL DATO AL SERVIDOR DESEADO

    private static $cont  = null;

    public function __construct() {
        exit('Init function is not allowed');
    }

    public static function connect(){
        if ( null == self::$cont ) {
            try {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect() {
        self::$cont = null;
    }
}
?>