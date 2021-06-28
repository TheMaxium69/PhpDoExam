<a href="index.php?controller=classement&task=index" class="btn btn-info">Classement de like</a>
  
<?php foreach($velos as $velo){ ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $velo["image"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="color: black;" ><?php echo $velo["modele"]; ?></h5>
    <p style="color: black;"><?php $modelVoyage = new \Model\Voyage();
                $voyagesNb = $modelVoyage->count($velo["id"]);
                echo $voyagesNb; 
                ?> voyage</p>
    <p style="color: black;"><?php $modelLike = new \Model\Like();
                $likeNb = $modelLike->count($velo["id"], "velo_id");
                echo $likeNb; 
                ?> Like</p>
    <a href="index.php?controller=velo&task=show&id=<?php echo $velo["id"]; ?>" class="btn btn-primary" >Voir le velos</a>
    <a href="index.php?controller=like&task=add&velo_id=<?php echo $velo['id']?>" class="btn btn-light">like ce velo</a>
  </div>
</div>

<?php } ?>
