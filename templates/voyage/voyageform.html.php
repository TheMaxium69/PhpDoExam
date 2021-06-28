<?php if (!$voyage) {?>
    <form action="index.php?controller=voyage&task=add" method="post">
        <div>
            <input type="hidden" name="velo_id" value="<?php echo $_GET['velo_id']?>">
            <label>Desc</label>
            <input type="text" class="form-control" name="description" placeholder="description">
        </div>
        <div>
            <label>image</label>
            <input type="text" class="form-control" name="image" placeholder="Lien image">
        </div>
        <input type="submit" class="btn btn-success" value="Creer un voyage">
    </form>

<?php }
