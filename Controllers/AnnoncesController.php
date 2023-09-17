<?php

namespace App\Controllers;
use App\Models\AnnoncesModel;


class AnnoncesController extends Controller{
    public function index(){
        $annoncesmodel=new AnnoncesModel;
        
        //$annonces=$annoncesmodel->findAll();
        
        $annonces=$annoncesmodel->findBy(['actif'=>1]);

        //var_dump($annonces);
        //$this->render('annonces/index', ['annonces' => $annonces]);

        $this->render('annonces/index', compact('annonces'));
    }

    public function lire(int $id){
        //echo $id;
        //echo $texte;
        $annoncesModel = new AnnoncesModel;

        $annonce=$annoncesModel->find($id);

        $this->render('annonces/lire', compact('annonce'));

    }
}

?>