<?php

require 'db.php';
require 'order.php';

if(Order::delete(trim($_REQUEST['id']))) echo "rezervacija obrisana!"; else "Nastala je greska!";