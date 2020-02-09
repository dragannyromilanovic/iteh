<?php require 'header.php'; ?>
<script type="text/javascript">
    function brisanje(apartman) {

        $.ajax({
            url: "http://enyro.localhost.com/API/apartman/"+apartman,
            type: "DELETE",
            dataType: 'json',
            crossDomain: true,
            success: function(deleted){
                console.log("#apartman_"+apartman);
                $("#apartman_"+apartman).remove();
            }
        });
    }
</script>

<div class="container" id="features">
    <div class="page-header text-center">
        <h1>Administracija</h1><a class = "btn btn-sm btn-success" href="unos.php">Nov apartman</a>
    </div>
    <?php if (!isset($_SESSION['nivo'])) die("Morate biti ulogovani!"); ?>
    <?php if ($_SESSION['nivo'] < 1) die("Pristup Vam nije dozvoljen!"); ?>

    <div class="row">
        <?php
        $apartmani = apartman::sviapartmani();

        while ($apartman = $apartmani->fetch_object()) {
            ?>
            <div class="col-md-4 feature" id="apartman_<?php echo $apartman->id; ?>">
                <img src="<?php echo $apartman->picture; ?>" width="64" height="64">


                <h3><a href="apartman.php?id=<?php echo $apartman->id; ?>"> <?php echo $apartman->title; ?> </a></h3>
                <p><?php echo $apartman->kolicina; ?></p>
                Cena: <?php echo $apartman->price; ?>
                <hr/>
                <a class = "btn btn-sm btn-info" href="izmena.php?id=<?php echo $apartman->id; ?>">Izmena</a>
                <input type = "button" onclick="brisanje(<?php echo $apartman->apartman_id; ?>)" value="Brisanje" class="btn btn-danger btn-sm"/>
            </div>
        <?php } ?>
    </div>


</div>

<?php require 'footer.php'; ?>