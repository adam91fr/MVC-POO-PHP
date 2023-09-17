<?php
namespace App\Controllers;

class MainController extends Controller{
    public function index(){
        echo " ceci est la page d'acccueil";

        $this->render('main/index',[] ,'home');
        
      
    }
}

?>
