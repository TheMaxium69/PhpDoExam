
<a href="index.php?controller=velo&task=index" class="btn btn-primary">Retour</a>

<h1><?php echo $velo['modele']?></h1>


<a href="index.php?controller=velo&task=del&id=<?php echo $velo['id']?>" class="btn btn-danger">supprimer ce velo</a>
<hr>

<?php if($voyages) {?>
    <h3>Les Voyages Assiosier</h3>

    <a href="index.php?controller=voyage&task=add&velo_id=<?php echo $velo['id']?>" class="btn btn-success">ajouter ce voyage</a>

    <?php foreach($voyages as $voyage){ ?>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $voyage["image"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="color: black;" ><?php echo $voyage["description"]; ?></h5>
    <a href="index.php?controller=voyage&task=add&id=<?php echo $voyage['id']?>" class="btn btn-warning">editer ce voyage</a>
    <a href="index.php?controller=voyage&task=del&id=<?php echo $voyage['id']?>" class="btn btn-danger">supprimer ce voyage</a>
  </div>
</div>
<?php } } else { 
    echo "pas de voyage";
} ?>