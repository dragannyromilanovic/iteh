<?php
require_once 'db.php'; 

class rezervacija {


    public static function moje() {
        $con = getConnection();
        $con->open();

        $q = "SELECT p.id as rezervacija_id, p.date as datum_rezervacije, p.*, g.naziv as grad, d.naziv as drzava, a.title as apartman, a.price as cena from rezervacija p JOIN apartman a ON p.apartman_id = a.id JOIN grad g on a.grad = g.id JOIN drzava d on g.drzava = d.id WHERE p.gost_id = ". $_SESSION['id'] . " ORDER By date DESC";

        
        
        if (!$r = $con->query($q)) {
            $con->close();
            return $q;
        } else {
            $con->close();
            return $r;
        }

    }




    public static function nova($apartmanId, $checkIn, $brojNoci) {
        $con = getConnection();
        $con->open();
        $q = "INSERT INTO rezervacija (apartman_id, gost_id, broj_noci, check_in) VALUES ('" . $apartmanId . "', '". $_SESSION['id'] . "', '" . $brojNoci . "', '" . $checkIn . "')";

        if (!$con->query($q)) {
            $con->close();
            return $q;
        } else {
            $con->close();
            return true;
        }
    }

    public static function sve() {
        $con = getConnection();
        $con->open();

      //  $q = "SELECT p.id as rezervacija_id, p.date as datum_rezervacije,  p.* from rezervacija p JOIN gost m ON p.gost_id = m.id ORDER By datum_rezervacije DESC";
        $q = "SELECT p.id as rezervacija_id, p.date as datum_rezervacije, p.*, g.naziv as grad, d.naziv as drzava, a.title as apartman , a.price as cena from rezervacija p JOIN apartman a ON p.apartman_id = a.id JOIN grad g on a.grad = g.id JOIN drzava d on g.drzava = d.id  ORDER By date DESC";
        
        if (!$r = $con->query($q)) {
            $con->close();
            var_dump($q); exit;
            return false;
        } else {
            $con->close();
            return $r;
        }
    }

    public static function isporuci($rezervacija_id) {
        $con = getConnection();
        $con->open();

        $q = 'UPDATE rezervacija SET status = 1 WHERE id = ' . $rezervacija_id;


        if (!$r = $con->query($q)) {
            $con->close();
            return $q;
        } else {
            $con->close();
            return true;
        }
    }

    public static function otkazi($rezervacija_id) {
        $con = getConnection();
        $con->open();

        $q = 'UPDATE rezervacija SET status = 3 WHERE id = ' . $rezervacija_id;


        if (!$r = $con->query($q)) {
            $con->close();
            return $q;
        } else {
            $con->close();
            return true;
        }
    }


   
    public static function obrisi($id) {
        $con = getConnection();
        $con->open();
        $r = $con->query("DELETE from rezervacija WHERE id = " . $id);
        $con->close();
        return $r;
    }



}
