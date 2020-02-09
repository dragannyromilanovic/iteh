<?php

require_once 'db.php';

class grad
{

    public static function dajGradove(){

        $con = getConnection();
        $con->open();

        if (!$r = $con->query("SELECT * FROM grad ")) {
            $con->close();
            return false;
        } else {
            $con->close();
            return $r;
        }

    }

    public static function dajNaziv($id){

        $con = getConnection();
        $con->open();
        if (!$r = $con->query("SELECT naziv FROM grad WHERE id=".$id)) {
            $con->close();
            return false;
        } else {
            $con->close();
            $grad = $r->fetch_object();
            return $grad->naziv;
        }

    }

}