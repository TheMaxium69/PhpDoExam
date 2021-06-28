<?php

namespace Controllers;

class Voyage extends Controller
{
    protected $modelName = \Model\Voyage::class;
 
    public function del()
    {
        
        $voyage_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $voyage_id = $_GET['id'];
        }

        if(!$voyage_id){
            die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
        }

        $this->model->delete($voyage_id);

        \Http::redirect('index.php?controller=velo&task=index');

    }

}

