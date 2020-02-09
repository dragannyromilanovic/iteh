<?php

require 'model/rezervacija.php';

if(rezervacija::otkazi(trim($_REQUEST['id']))) echo "rezervacija otkazana!"; else "Nastala je greska!";