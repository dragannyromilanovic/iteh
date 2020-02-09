
<?php

session_start();
require_once '../API/flight/Flight.php';
require_once '../API/Database.php';
require_once '../model/gost.php';
require_once '../model/apartman.php';
require_once '../API/flight/jsonindent.php';
require_once 'Helper.php';

// Akcije kontrolera:

Flight::route('POST /izmenaapartmana', function() {

    if (Helper::izmenaapartmana($_POST['apartman_id']) == true) {
        Flight::redirect("../apartmani.php");
    }

    echo "Greska u kontroleru za izmenu apartmana!";
    return false;
});


Flight::route('POST /unosapartmana', function() {
    Helper::unosapartmana();
    Flight::redirect("../apartmani.php");
});

Flight::route('POST /registracija', function() {

    $ime = trim($_POST['ime']);
    $email = trim($_POST['email']);
    $lozinka = trim($_POST['password']);
    $adresa = trim($_POST['adresa']);
    $drzava = trim($_POST['drzava']);

    if (trim($_POST['pol']) == "Musko")
        $pol = 1;
    else
        $pol = 0;

    if (gost::dodaj($ime, $email, $lozinka, $adresa, $pol, $drzava))
        Flight::redirect("../logovanje.php");
});


Flight::route('POST /logovanje', function() {

    $email = trim($_POST['email']);
    $lozinka = trim($_POST['password']);

    if (gost::uloguj(trim($_REQUEST['email']), trim($_REQUEST['password']))) {
        Flight::redirect("../index.php");
    } else
        echo "Uneti su pogresni kredencijali.";
});


Flight::route('GET /logout', function() {

    session_destroy();
    Flight::redirect("../index.php");
});

Flight::start();
?>
