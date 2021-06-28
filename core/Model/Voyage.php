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

    /**
     * insert un voyage
     * 
     */

    function insert(string $description, string $image, int $velo_id)
    {

        $maRequeteInsertRecipe = $this->pdo->prepare("INSERT INTO `voyages`(`description`, `image`, `velo_id`) VALUES (:description, :image, :velo_id)");

        $maRequeteInsertRecipe->execute([
            'description' => $description,
            'image' => $image,
            'velo_id' => $velo_id
        ]);

    }


}