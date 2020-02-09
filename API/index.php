<?php

session_start();
require_once '../API/flight/Flight.php';
require_once '../API/Database.php';
require_once '../model/gost.php';
require_once '../model/apartman.php';
require_once '../API/flight/jsonindent.php';
Flight::register('db', 'Database', array('enyro'));

Flight::route('GET /apartmani', function() {
    header("Content-Type: application/json; charset=utf-8");

    $db = Flight::db();
    $db->select("apartman", "apartman.id as apartman_id, apartman.*, grad.*", "grad", "grad", "id", null, null);
    $niz = array();
    while ($red = $db->getResult()->fetch_object()) {

        $niz[] = $red;
    }

    $json_niz = json_encode($niz);
    echo indent($json_niz);
    return false;
});

Flight::route('DELETE /apartman/@id', function($id) {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    if ($db->delete("apartman", "id", $id)) {
        echo json_encode('apartman uspesno obrisan!');;
        return true;
    } else
        echo json_encode('Error!');
    return false;
});

Flight::route('POST /obrisi_kupca', function() {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    if ($db->delete("gost", "id", $_REQUEST['id'])) echo 'ok';
    else echo json_encode('Error!');
});

Flight::route('GET /apartmani_grad/@grad', function($grad) {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $db->select("apartman", "apartman.id as apartman_id, apartman.*, grad.*", "grad", "grad", "id", "apartman.grad =" . $grad, null);
    $niz = array();
    while ($red = $db->getResult()->fetch_object()) {
        $niz[] = $red;
    }
    $json_niz = json_encode($niz);
    echo indent($json_niz);
    return false;
});

Flight::route('GET /drzave', function() {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();
    $db->select("drzava", "*", "", "", "", null, null);
    $niz = array();
    while ($red = $db->getResult()->fetch_object()) {
        $niz[] = $red;
    }
    $json_niz = json_encode($niz);
    echo indent($json_niz);
    return false;
});

Flight::route('GET /statistika_apartmani', function() {
    header("Content-Type: application/json; charset=utf-8");
    $db = Flight::db();

    if (isset($_GET['grad'])) {
        $db->select(" apartman ", ' * ', "", "", "", "apartman.grad=" . $_GET['grad'], null, 'grad');
    } else {
        $db->select("apartman", '*', "", "", "", null, null, '', '');
    }

    $niz = array();

    while ($red = $db->getResult()->fetch_object()) {
        $niz[] = $red;
    }

    $JSONprikaz = '{  "cols": [{"label":"Naziv apartmana","type":"string"}, {"label":"Rezervisano","type":"number"}, {"label":"Otkazano","type":"number"}], "rows":[ ';
    foreach ($niz as $key => $value) {

        $JSONprikaz = $JSONprikaz . '{"c":[{"v":"' . $value->title . '"},{"v":' . $value->rezervisano . '},{"v":' . $value->otkazano . '}]},';
    }

    echo $JSONprikaz . ']}';

    return false;
}
);
Flight::route('GET /mapa', function() {
    header("Content-Type: application/json; charset=utf-8");

    $db = Flight::db();
    $db->select(" drzava ", 'geoSirina,geoDuzina,naziv', "", "", " ", null, null);
    $niz = array();
    while ($red = $db->getResult()->fetch_object()) {
        $niz[] = $red;
    }
    $json_niz = json_encode($niz);
    echo '{' . '"markeri":' . indent($json_niz) . '}';
    return false;
});

Flight::start();
?>
