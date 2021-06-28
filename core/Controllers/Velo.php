<?php

namespace Controllers;

class Velo
{
    /**
     * afficher Velo
     */
    public function index()
    {

        $titreDeLaPage = "Page des Velos";


        \Rendering::render("velo/velos", compact('titreDeLaPage'));

    }
}

