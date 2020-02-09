<?php require_once 'db.php'; ?>
<?php require_once 'gost.php'; ?>


    <?php
    if (gost::obrisi($_REQUEST["id"])) {
        echo "gost uspesno obrisan.";
    } else {
            echo 0;
        }

?>
     