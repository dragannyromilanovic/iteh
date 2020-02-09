<?php

require_once 'db.php';

class gost {

    private $ime;
    private $email;
    private $lozinka;
    private $adresa;
    private $pol;

    public static function dodaj($ime, $email, $lozinka, $adresa, $pol) {

        $con = getConnection();
        $con->open();

        if (!$con->query("INSERT INTO gost (ime, email, lozinka, adresa, pol) VALUES ('" . $ime . "', '" . $email . "', '" . $lozinka . "','" . $adresa . "','" . $pol . "')")) {
            $con->close();
            echo "Nastala je greska!";
        } else {
            $con->close();
            return true;
        }
    }

    public static function uloguj($email, $lozinka) {
        $con = getConnection();
        $con->open();
        $q = "SELECT id, nivo from gost WHERE email='" . $email . "' AND lozinka='" . $lozinka . "'";
        if ((mysqli_num_rows($q = $con->query($q))) != 1) {
            $con->close();
            return $q;
        } else {
            $con->close();
            $_SESSION['email'] = $email;
            $member = mysqli_fetch_assoc($q);
            $_SESSION['nivo'] = $member['nivo'];
            $_SESSION['id'] = $member['id'];
            return true;
        }
    }

    public static function dajSve() {
        $con = getConnection();
        $con->open();

        if (!$r = $con->query("SELECT gost.id as gost_id, gost.*, drzava.* FROM gost JOIN drzava ON gost.drzava = drzava.id")) {
            $con->close();
            return false;
        } else {
            $con->close();
            return $r;
        }
    }

    public static function obrisi($id) {
        $con = getConnection();
        $con->open();
        $r = $con->query("DELETE from gost WHERE id = " . $id);
        $con->close();
        return $r;
    }

    public static function all() {
        $con = getConnection();
        $con->open();

        if (!$r = $con->query("SELECT id, ime, adresa, email, nivo, pol, datum_registracije FROM gost ")) {
            $con->close();
            return false;
        } else {
            $con->close();
            return $r;
        }
    }

}

?>
