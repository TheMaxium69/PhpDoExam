<?php

namespace Model;


class Like extends Model
{

    protected $table = "likes";

    function add(int $id, string $col_name)
    {
        if($col_name == "velo_id"){
                
            $maRequeteAddLikeVelo = $this->pdo->prepare("INSERT INTO `likes`(`velo_id`) VALUES (:id)");

            $maRequeteAddLikeVelo->execute([
                'id' => $id
            ]);
        }else if($col_name == "voyage_id"){
                
            $maRequeteAddLikeVoyage = $this->pdo->prepare("INSERT INTO `likes`(`voyage_id`) VALUES (:id)");

            $maRequeteAddLikeVoyage->execute([
                'id' => $id
            ]);
        }
        
    }


    function count(int $id, string $where)
    {
            if ($where == "velo_id"){
    
                $maRequeteCountVeloLike =  $this->pdo->prepare("SELECT * FROM `likes` WHERE `velo_id`=:id");
                $maRequeteCountVeloLike->execute(["id"=> $id]);
                $LikeNb = $maRequeteCountVeloLike->rowCount();
                return $LikeNb;
    
            } else if ($where == "voyage_id"){
    
                $maRequeteCountVoyageLike =  $this->pdo->prepare("SELECT * FROM `likes` WHERE `voyage_id`=:id");
                $maRequeteCountVoyageLike->execute(["id"=> $id]);
                $LikeNb = $maRequeteCountVoyageLike->rowCount();
                return $LikeNb;
            }
    }
}