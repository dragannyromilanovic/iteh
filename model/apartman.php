<?php

require_once 'db.php'; 

class apartman {


    public static function dodaj($naziv, $opis, $slika, $grad, $cena, $Rezervisano) {
        $con = getConnection();
        $con->open();

        $q = "INSERT INTO apartman (title, opis, picture, grad, price, rezervisano) VALUES ('" . $naziv . "', '" . $opis . "', '" . $slika . "', " . $grad . ", '" . $cena . "', '" . $Rezervisano . "')";

        if (!$con->query($q)) {
            $con->close();
            return $q;
        } else {
            $con->close();
            return true;
        }
    }

    public static function sviapartmani() {
        $con = getConnection();
        $con->open();

        $q = "SELECT apartman.id as apartman_id, apartman.* from apartman ORDER BY date_entered DESC";

        if (!$r = $con->query($q)) {
            $con->close();
            return $q;
        } else {
            $con->close();
            return $r;
        }
    }

    public static function apartmanigrad($id) {
        $con = getConnection();
        $con->open();

        if (!$r = $con->query("SELECT * from apartman WHERE grad like '" . $id . "'")) {
            $con->close();
            return false;
        } else {
            $con->close();
            return $r;
        }
    }


    public static function dajapartman($id) {
        $con = getConnection();
        $con->open();

        if (!$r = $con->query("SELECT * from apartman where id = " . $id)) {
            $con->close();
            return false;
        } else {
            $con->close();
            return mysqli_fetch_object($r);
        }
    }

  

    public static function obrisi($id) {
        $con = getConnection();
        $con->open();
        $r = $con->query("DELETE from apartman WHERE id = " . $id);
        $con->close();
        return $r;
    }



    public static function izmeni($naziv, $opis, $slika, $cena, $kolicina, $grad, $Rezervisano, $id) {
        $con = getConnection();
        $con->open();
        $sql = "UPDATE apartman SET title='" . $naziv . "', opis='" . $opis . "', picture='" . $slika . "', grad='" . $grad . "', price='" . $cena . "', kolicina='" . $kolicina . "', Rezervisano='" . $Rezervisano . "' WHERE id = " . $id;

        if (!$con->query($sql)) {
            $con->close();
            echo $sql;
            return false;
        } else {
            $con->close();
            return true;
        }
    }

}
