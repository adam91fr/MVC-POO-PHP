<?php
namespace App;

class Autoloader {
    
    static function register(){
        spl_autoload_register(
            [
            __CLASS__,
            'autoload'
            ]
        );
    }
    
    static function autoload($class){

        // "App\Client\Compte"
        $class=str_replace(__NAMESPACE__.'\\','', $class);

        // "Client\Compte"
        $class=str_replace('\\', '/', $class);
        //echo $class." ";

        
        $fichier=__DIR__.'/'.$class.'.php';
        if(file_exists($fichier)){
            //echo ' Autoload '.$fichier." ";
            require_once $fichier;
        }
    }
}

?>