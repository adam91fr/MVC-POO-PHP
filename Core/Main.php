<?php
namespace App\Core;
use App\Controllers\MainController;

class Main
{
    public function start(){
        //echo 'Ca fonctionne';

        // http://mes-annonces.test/controleur/methode/parametres
        // http://mes-annonces.test/annonces/details/brouette
        
        // http://mes-annonces.test/index.php?p=annonces/details/brouette

        
        $uri=$_SERVER['REQUEST_URI'];

        if(!empty($uri) && $uri!='/' && $uri[-1]==="/"){
            $uri=substr($uri, 0, -1);

            http_response_code(301);

            header('Location: '.$uri);
        }

        echo $_GET['p'];
        //var_dump($_GET);
        // p=controleur/methode/parametres
        $params=[];
        if(isset($_GET['p']))
            $params = explode('/', $_GET['p']);

        echo ' Params : ';
        var_dump($params);
        
        //if($params[0] != '' ){
        if(!empty($params[0])){
            
            var_dump($params);
            $controller='\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';

            echo ' Controller ' . $controller;
            
            $controller=new $controller();

            $action=(isset($params[0])) ? array_shift($params) : 'index';
            
            echo ' Action '. $action;
            
            //$controller->$action($params) :
            if(method_exists($controller, $action)){
                echo " method_exists : OUI ";
                (isset($params[0])) ? call_user_func_array([$controller,  $action], $params) : $controller->$action(); 
            }else{
                http_response_code(404);
                echo " La page n'existe pas";
            }
        

        }else{
            echo " Pas de paramètre ";
            $controller = new MainController();
            $controller->index();

        }
    }
}
?>