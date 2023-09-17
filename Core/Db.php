<?php
namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO{
    private static $instance;

    private const DBHOST='localhost';
    private const DBUSER = "root";
    private const DBPASSWORD='';
    private const DBNAME='test';

    private function __construct(){
        $dsn='mysql:dbname='.self::DBNAME.';host='.self::DBHOST;

        try{

            parent::__construct($dsn, self::DBUSER, self::DBPASSWORD);

            //PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("ERREUR : ".$e->getMessage());
        }
    }

    public static function getInstance():self{
        //if(seft::$instance===null){
            if(Db::$instance===null){
            self::$instance=new self();
        }
        return self::$instance;
    }
}
?>