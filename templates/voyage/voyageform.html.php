<?php if (!$voyage) {?>
    <form action="index.php?controller=voyage&task=add" method="post">
        <input type="hidden" name="velo_id" value="<?php echo $_GET['velo_id']?>">
        <div>
            <label>Desc</label>
            <input type="text" class="form-control" name="description" placeholder="description">
        </div>
        <div>
            <label>image</label>
            <input type="text" class="form-control" name="image" placeholder="Lien image">
        </div>
        <input type="submit" class="btn btn-success" value="Creer un voyage">
    </form>

<?php } else { ?>

<form action="index.php?controller=voyage&task=edit" method="post">
    <input type="hidden" class="form-control" name="velo_id" value="<?php echo $voyage['velo_id'];?>">
    <input type="hidden" class="form-control" name="id" value="<?php echo $voyage['id'];?>">
    <div>
        <label>Desc</label>
        <input type="text" class="form-control" name="description" value="<?php echo $voyage['description'];?>" placeholder="Description">
    </div>
    <div>
        <label>Image</label>
        <input type="text" class="form-control" name="image" value="<?php echo $voyage['image'];?>" placeholder="image">
    </div>
    <input type="submit" class="btn btn-success" value="Edit un voyage">
</form>
<?php }?>

