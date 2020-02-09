<?php

class Helper {


public static function unosapartmana (){
    
                        $slikaapartmana = '';

                        if($_FILES['slike']['size'] > 0) {
                            $slikaapartmana =  self::uploadSlike();
                        }    

                        $naziv = trim($_POST['title']);
                        $sastojci = trim($_POST['opis']);
                        $grad = trim($_POST['grad']);
                        $cena = trim($_POST['price']);
                        $slika = trim($slikaapartmana);
                        $drzava = trim($_POST['drzava']);
                        $Rezervisano = trim($_POST['Rezervisano']);
                        return apartman::dodaj($naziv, $sastojci, $slika, $grad, $cena, $Rezervisano, $drzava);

}

public static function izmenaapartmana($apartman_id){

                        $slikaapartmana = '';

                        if($_FILES['slike']['size'] > 0) {
                            $slikaapartmana =  self::uploadSlike();
                        }    

                        $naziv = trim($_POST['title']);
                        $sastojci = trim($_POST['opis']);
                        $cena = trim($_POST['price']);
                        $slika = trim($slikaapartmana);
                        $kolicina = trim($_POST['kolicina']);
                        $grad = trim($_POST['grad']);
                        $Rezervisano = trim($_POST['Rezervisano']);
                        return apartman::izmeni($naziv, $sastojci, $slika, $cena, $kolicina, $grad, $Rezervisano, trim($_POST['apartman_id']));

                
}

public static function uploadSlike(){

                    $kon = 0;
                    $zb = 0;
                    $tr = "";
                    $adreseslikasmanjene = "";
                    $adreseslikaoriginal = "";
                    $uspeo = false;

                    if (is_uploaded_file($_FILES['slike']['tmp_name'][$kon])) {
                        $zb = $zb + 1;
                    }

                    $kon = $kon + 1;

//adresa foldera u koje se fajlovi kopiraju
                    $adresafolderasmanjene = "../slike/apartmani";
                    $adresafolderaoriginalne = "../slike/apartmani/original";
                    $k = 0;
//petlja se izvrsava onoliko puta koliko slika je uploadovano
                    while ($k < $zb) {
//ispituje se velicina fajla/slike
                        if ($_FILES["slike"]["size"][$k] < 1000000000) {
//ispituje se tip fajla/slike
                            if ($_FILES["slike"]["type"][$k] == "image/jpeg" OR $_FILES["slike"]["type"][$k] == "image/png") {
                                $uploadedfile = $_FILES['slike']['tmp_name'][$k];
                                $src = imagecreatefromjpeg($uploadedfile); //kreira se slika na osnovu uploadovane slike
//prihvataju se originalne vrednosti dimenzija slike
                                list($width, $height) = getimagesize($uploadedfile);

//ovde se podesava sirinia i visina slike
                                $newwidth = 150;
                                $newheight = ($height / $width) * $newwidth;
                                $tmp = imagecreatetruecolor($newwidth, $newheight);
//ovde se kreira smanjena slika
                                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                                $target1 = $adresafolderasmanjene . "/";
                                $target1 = $target1 . "_" . basename($_FILES['slike']['name'][$k]); //adresa je adresafoldera+imeslike+random broj
                                $target2 = $adresafolderaoriginalne . "/";
                                $target2 = $target2 . rand() . basename($_FILES['slike']['name'][$k]);

//kopira originalnu sliku na odgovarajuce mesto
                                copy($_FILES['slike']['tmp_name'][$k], $target2);

//umanjena slika se postavlja na odgovarajucu adresu
                                if (imagejpeg($tmp, $target1, 100)) {
                                    imagedestroy($src);
                                    imagedestroy($tmp);
                                    $adreseslikasmanjene = $adreseslikasmanjene . $target1 . ","; //string koji sadrzi adrese svih uploadovanih slika
                                    $adreseslikaoriginal = $adreseslikaoriginal . $target2 . "";
                                    $uspeo = true;
                                } else {
                                    ?>
                                    <a href="unos.php">Pokušajte ponovo</a>
                                    <?php
                                    echo "Upload nije uspeo";
                                }
                            } else {
                                ?>
                                <a href="unos.php">Pokušajte ponovo</a>
                                <?php
                                echo "Upload nije uspeo - tip fajla nije odgovarajuci";
                            }
                        } else {
                            ?>
                            <a href="unos.php">Pokušajte ponovo</a>
                            <?php
                            echo "Upload nije uspeo - ogranicenje na velicinu fajla je 1MB";
                        }

                        $k = $k + 1;
                    }

                if($uspeo) return str_replace ("../", "",  $adreseslikaoriginal) ;

                return $uspeo;

}


} //kraj klase