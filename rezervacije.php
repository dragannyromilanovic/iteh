<?php require 'header.php'; ?>


<script>
    $(document).ready(function() {
        $("#rezervacije").dataTable({
            "language": {
                "url": "DataTables/i18n/serbian.json"
            }
        });
    });
</script>

<div class="container">
    <div class="page-header text-center">
        <h1>eNyro</h1>
    </div>
    <?php if(!isset($_SESSION['nivo'])) die ("Morate biti ulogovani!") ;?>
    <table id="rezervacije" class="table table-striped table-bordered" style="width:100%">

                <thead>
                    <tr>
                        <th>Apartman</th>
                        <th>Grad</th>
                        <th>Drzava</th>
                        <th>Check in</th>
                        <th>Broj noci</th>
                        <th>Cena</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($_SESSION['nivo'] == 0) {
                 $rezervacije = rezervacija::moje();
                    } else {
                 $rezervacije = rezervacija::sve();       
                    }

                    while ($red = mysqli_fetch_array($rezervacije)) {
                        ?>
                        <tr id="<?php echo $red['rezervacija_id']; ?>" class = "warning">
                            <td > <?php echo $red['apartman']; ?></td>
                            <td ><?php echo $red['grad']; ?></td>
                            <td ><?php echo $red['drzava']; ?></td>
                            <td ><?php echo $red['check_in']; ?></td>
                            <td ><?php echo $red['broj_noci']; ?></td>
                            <td ><?php echo $red['broj_noci'] *  $red['cena']?></td>
                            <td ><?php
                                switch ($red['status']) {
                                    case 1:
                                        echo 'Zavrseno';
                                        break;
                                    case 0:
                                        echo 'U toku';
                                        break;
                                    case 3:
                                        echo 'Otkazano';
                                        break;
                                    default:
                                        echo 'Potvrdjeno';
                                        break;
                                }
                                ?></td>
                            <td> <?php if ($red['status'] == 0) { ?>
                            <button class='btn btn-success' name="otkazi" value="Otkazivanje" onclick="otkaziPorudzbinu(<?php echo $red['rezervacija_id']; ?>)">Otkazivanje</button>
                                    
                                <?php } ?> 
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>


            </table>

</div>

<?php require 'footer.php'; ?>