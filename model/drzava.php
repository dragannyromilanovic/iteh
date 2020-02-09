<?php

require_once 'db.php';

class Drzava {

    private $naziv;
    private $geoSirina;
    private $geoDuzina;

    public static function dajDrzave(){

    	$con = getConnection();
        $con->open();

        if (!$r = $con->query("SELECT * FROM drzava ")) {
            $con->close();
            return false;
        } else {
            $con->close();
            return $r;
        }

    }


}
