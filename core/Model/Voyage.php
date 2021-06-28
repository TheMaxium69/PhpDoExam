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

        $maRequeteInsertVoyage = $this->pdo->prepare("INSERT INTO `voyages`(`description`, `image`, `velo_id`) VALUES (:description, :image, :velo_id)");

        $maRequeteInsertVoyage->execute([
            'description' => $description,
            'image' => $image,
            'velo_id' => $velo_id
        ]);

    }

    /**
     * update une voyage
     *
     */

    function update(int $id, string $description, string $image) : void
    {

        $maRequeteUpdateVoyage = $this->pdo->prepare("UPDATE `voyages` SET `description`=:description,`image`=:image WHERE `id`=:id");

        $maRequeteUpdateVoyage->execute([
            'id' => $id,
            'description' => $description,
            'image' => $image
        ]);
    }


    function updateLike(int $id, int $likeNb) : void
    {
        $maRequeteUpdateLikeVoyage = $this->pdo->prepare("UPDATE `voyages` SET `likes`=:likes WHERE `id`=:id");

        $maRequeteUpdateLikeVoyage->execute([
            'id' => $id,
            'likes' => $likeNb
        ]);
    }

    function orderAll() 
    {
        $maRequeteOrderLikeVoyage = $this->pdo->query("SELECT *
        FROM `voyages`
        ORDER BY `voyages`.`likes` DESC");

        $velosOrder = $maRequeteOrderLikeVoyage->fetchAll();

        return $velosOrder;
    }

}