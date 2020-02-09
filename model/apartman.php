<?php

require_once 'db.php'; 

class apartman {


    public static function dodaj($title, $sastojci, $picture, $category, $price, $kolicina, $grad) {
        $con = getConnection();
        $con->open();

        $q = "INSERT INTO apartman (title, opis, picture, category, price, kolicina, grad) VALUES ('" . $title . "', '" . $sastojci . "', '" . $picture . "', " . $category . ", '" . $price . "', '" . $kolicina . "', '" . $grad . "')";

        var_dump($q);
        exit;

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

        if (!$r = $con->query("SELECT * from apartman WHERE category like '" . $id . "'")) {
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



    public static function izmeni($title, $sastojci, $picture, $category, $price, $kolicina, $grad, $Rezervisano, $id) {
        $con = getConnection();
        $con->open();
        $sql = "UPDATE apartman SET title='" . $title . "', opis='" . $sastojci . "', picture='" . $picture . "', grad='" . $grad . "', price='" . $price . "', kolicina='" . $kolicina . "', category='" . $category . "', Rezervisano='" . $Rezervisano . "' WHERE id = " . $id;

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
