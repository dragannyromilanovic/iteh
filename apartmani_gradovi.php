<?php require 'header.php'; ?>
<script type="text/javascript">
    
    function dodajUkorpu(proizvod){

        var price = $('#price_'+proizvod).val();
        var naziv = $('#naziv_'+proizvod).val();

        $.ajax({
            url: "dodajUkorpu.php",
            method: "POST",
            data: { proizvod: proizvod, price: price, naziv: naziv }
        }).done(function(response) {
            alert("apartman uspesno dodat u kupovnu korpu."+response);
        });

    }

</script>


<div class="container">
    <div class="page-header text-center">
        <h1><?php echo grad::dajNaziv($_GET['id']); ?></h1>
    </div>

    <div class="container" id="features">
        <div class="row">
            <?php
            $curl = curl_init("http://enyro.localhost.com/API/apartmani_grad/" . $_GET['id']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
            curl_setopt($curl, CURLOPT_HTTPGET, true);
            $curl_odgovor = curl_exec($curl);
            curl_close($curl);
            $apartmani = json_decode($curl_odgovor);

            foreach ($apartmani as $apartman) {
                ?>
                <div class="col-md-4 feature" id="apartman_<?php echo $apartman->id; ?>">
                    <img src="<?php echo $apartman->picture; ?>" width="64" height="64">
                    <h3><?php echo $apartman->title; ?></h3>
                    <p><?php echo $apartman->opis; ?></p>
                    <hr>
                    <input type = "button" onclick="dodajUkorpu(<?php echo $apartman->apartman_id; ?>)" value="Dodaj u korpu (<?php echo $apartman->price; ?> din)" class="btn btn-danger btn-sm"/>
                    <input type = "hidden" id="price_<?php echo $apartman->apartman_id;?>" value="<?php echo $apartman->price; ?>"/>
                    <input type = "hidden" id="naziv_<?php echo $apartman->apartman_id;?>" value="<?php echo $apartman->title;?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>