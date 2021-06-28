<?php foreach($velos as $velo){ ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $velo["image"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="color: black;" ><?php echo $velo["modele"]; ?></h5>
    <a href="index.php?controller=velo&task=show&id=<?php echo $velo["id"]; ?>" class="btn btn-primary" >Voir le velos</a>
  </div>
</div>

<?php } ?>
