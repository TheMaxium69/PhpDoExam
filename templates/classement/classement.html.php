<h1>Classement des velos par nombre de like</h1>
<?php foreach($velosOrder as $velo){ ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $velo["image"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="color: black;" ><?php echo $velo["modele"]; ?></h5>
    <p style="color: black;"><?php $modelLike = new \Model\Like();
                $likeNb = $modelLike->count($velo["id"], "velo_id");
                echo $likeNb; 
                ?> Like</p>
    <a href="index.php?controller=velo&task=show&id=<?php echo $velo["id"]; ?>" class="btn btn-primary" >Voir le velos</a>
    <a href="index.php?controller=like&task=add&velo_id=<?php echo $velo['id']?>" class="btn btn-light">like ce velo</a>
  </div>
</div>

<?php } ?>

<hr>
<h1>Classement des voyage par nombre de like</h1>

<?php foreach($voyagesOrder as $voyage){ ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $voyage["image"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="color: black;" ><?php echo $voyage["description"]; ?></h5>
    <p style="color: black;"><?php $modelLike = new \Model\Like();
                $likeNb = $modelLike->count($voyage["id"], "voyage_id");
                echo $likeNb; 
                ?> Like</p>
<a href="index.php?controller=like&task=add&voyage_id=<?php echo $voyage['id']?>" class="btn btn-light">like ce voyage</a>
    <a href="index.php?controller=voyage&task=add&id=<?php echo $voyage['id']?>" class="btn btn-warning">editer ce voyage</a>
    <a href="index.php?controller=voyage&task=del&id=<?php echo $voyage['id']?>" class="btn btn-danger">supprimer ce voyage</a>
  </div>
</div>
<?php } ?>

