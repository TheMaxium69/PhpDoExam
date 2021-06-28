<?php

namespace Model;


class Velo extends Model
{

    protected $table = "velos";
    
    function addLike(int $id, int $likeNb) : void
    {
        $maRequeteUpdateLikeVelo = $this->pdo->prepare("UPDATE `velos` SET `likes`=:likes WHERE `id`=:id");

        $maRequeteUpdateLikeVelo->execute([
            'id' => $id,
            'likes' => $likeNb
        ]);
    }

    function orderAll() 
    {
        $maRequeteOrderLikeVelo = $this->pdo->query("SELECT *
        FROM `velos`
        ORDER BY `velos`.`likes` DESC");

        $velosOrder = $maRequeteOrderLikeVelo->fetchAll();

        return $velosOrder;
    }
}