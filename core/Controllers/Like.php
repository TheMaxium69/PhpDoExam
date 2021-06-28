<?php

namespace Controllers;

class Like extends Controller
{
    protected $modelName = \Model\Like::class;
 

    public function add(){

        if(!empty($_GET['velo_id'])){
            $velo_id = htmlspecialchars($_GET['velo_id']); 
            $this->model->add($velo_id, "velo_id");
        }

        if(!empty($_GET['voyage_id'])){
            $voyage_id = htmlspecialchars($_GET['voyage_id']); 
            $this->model->add($voyage_id, "voyage_id");
        }

        \Http::redirect('index.php?controller=velo&task=index');

    }
}

