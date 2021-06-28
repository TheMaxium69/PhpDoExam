<?php

namespace Controllers;

class Velo extends Controller
{
    protected $modelName = \Model\Velo::class;
    /**
     * afficher Velo
     */
    public function index()
    {

        $velos = $this->model->findAll();
        $titreDeLaPage = "Page des Velos";

        \Rendering::render("velo/velos", compact('velos', 'titreDeLaPage'));

    }
    public function show()
    {
        
        $velo_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $velo_id = $_GET['id'];
        }

        if(!$velo_id){
            die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
        }

        $velo = $this->model->find($velo_id);
        
        $modelVoyage = new \Model\Voyage();
        $voyages = $modelVoyage->findAllByVelo($velo_id);
        
        $titreDeLaPage = $velo['modele'];


        \Rendering::render("velo/velo", compact('velo', 'voyages', 'titreDeLaPage'));

    }
    
    public function del()
    {
        
        $velo_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $velo_id = $_GET['id'];
        }

        if(!$velo_id){
            die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
        }

        $this->model->delete($velo_id);

        \Http::redirect('index.php?controller=velo&task=index');

    }

}

