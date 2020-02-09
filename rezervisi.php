<?php require 'header.php'; ?>
<div class="container">
    <div class="page-header text-center">
        <h1>eNyro</h1>
    </div>


    <?php if(!isset($_SESSION['nivo'])) die ("Morate biti ulogovani!") ;?>

    <?php


    foreach ($_POST['apartmanId'] as $apartmanId => $cena)

        $check_in = trim($_POST['check_in_'.$apartmanId]);
        $broj_noci = trim($_POST['broj_noci_'.$apartmanId]);
        $cena = trim($cena);

        if(rezervacija::nova($apartmanId, $check_in, $broj_noci) === true) echo "Uspesno rezervisano";
    else echo "Nastala je greska";
    ?>

</div>

<?php require 'footer.php'; ?>