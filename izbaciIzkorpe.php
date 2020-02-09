<?php
session_start();
unset($_SESSION['korpa'][$_GET['id']]);
$br_apartmana = 0;
$ukupna_cena = 0;
foreach ($_SESSION['korpa'] as  $apartman) {
$br_apartmana = $br_apartmana + $apartman['kolicina'];
$ukupna_cena = (int)$ukupna_cena + (int)$apartman['price'] * (int)$apartman['kolicina'];
}
echo "U korpi se nalazi trenutno ".$br_apartmana." apartmana ukupne vrednosti ".$ukupna_cena. " dinara.";

?>