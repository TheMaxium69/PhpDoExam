<?php

namespace Controllers;

class Classement
{
    /**
     * afficher Classement
     */
    public function index()
    {

        
        $modelLike = new \Model\Like();
        $modelVelo = new \Model\Velo();
        $velos = $modelVelo->findAll();

        foreach($velos as $velo){
            $likeNb = $modelLike->count($velo['id'], "velo_id");
            $modelVelo->updateLike($velo['id'], $likeNb);
        }
    
        $velosOrder = $modelVelo->orderAll();
        
        
        $modelVoyage = new \Model\Voyage();
        $voyages = $modelVoyage->findAll();

        foreach($voyages as $voyage){
            $likeNb = $modelLike->count($voyage['id'], "voyage_id");
            $modelVoyage->updateLike($voyage['id'], $likeNb);
        }
    
        $voyagesOrder = $modelVoyage->orderAll();
        
        $titreDeLaPage = "Classement";
        \Rendering::render("classement/classement", compact('velosOrder', 'voyagesOrder', 'titreDeLaPage'));

    }
}

