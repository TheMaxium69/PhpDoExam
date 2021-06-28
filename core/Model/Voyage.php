<?php

namespace Model;


class Voyage extends Model
{

    protected $table = "voyages";


     /**
     * trouve toutes les voyages liées à un velo
     * 
     * @param integer $velo_id
     * @return array|bool
     *
     */

    function findAllByVelo(int $velo_id)
    {


        $resultat =  $this->pdo->prepare('SELECT * FROM voyages WHERE velo_id = :velo_id');
        $resultat->execute(["velo_id"=> $velo_id]);

        $voyage = $resultat->fetchAll();

        return $voyage;
    }


}