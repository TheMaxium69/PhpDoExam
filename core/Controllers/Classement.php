<?php

namespace Controllers;

class Classement
{
    /**
     * afficher Classement
     */
    public function index()
    {

        
        $modelVelo = new \Model\Velo();
        $modelLike = new \Model\Like();
        $velos = $modelVelo->findAll();

        foreach($velos as $velo){
            $likeNb = $modelLike->count($velo['id'], "velo_id");
            $modelVelo->addLike($velo['id'], $likeNb);
        }
    
        $velosOrder = $modelVelo->orderAll();
        
    
        $titreDeLaPage = "Classement";

        \Rendering::render("classement/classement", compact('velosOrder', 'titreDeLaPage'));

    }
}

