<?php
include "model/db.php";
$con = getConnection();
$con->open();

$sql = "UPDATE gost SET ".strtolower($_REQUEST ['columnName'])."='".$_REQUEST['value']."' WHERE id=".$_REQUEST['id'];

if (isSet($sql) && $con->query($sql) === TRUE) echo $_REQUEST["value"];
else echo "Nastala je greska!";

$con->close();
?>