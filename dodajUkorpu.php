<?php

session_start();

$br_apartmana = 0;
$ukupna_cena = 0;


if(isset($_SESSION['korpa'][$_POST['proizvod']])) {
	$_SESSION['korpa'][$_POST['proizvod']]['kolicina'] ++;
} else {
	$_SESSION['korpa'][$_POST['proizvod']] = array(
	'price' => $_POST['price'],
	'id' => $_POST['proizvod'],
	'naziv' => $_POST['naziv'],
	'kolicina' => 1
	);
}

foreach ($_SESSION['korpa'] as  $apartman) {
$br_apartmana = $br_apartmana + $apartman['kolicina'];
$ukupna_cena = (int)$ukupna_cena + (int)$apartman['price'] * (int)$apartman['kolicina'];

}

echo "U korpi se nalazi trenutno ".$br_apartmana." apartmana ukupne vrednosti ".$ukupna_cena. " dinara.";

?>