function izracnajTotal (apartmanId) {

    $("#total_"+apartmanId).text($("#cena_"+apartmanId).text()*$("#broj_noci_"+apartmanId).val())

}

    function otkaziPorudzbinu(id) {


        $.ajax({
            url: "otkaziPorudzbinu.php?id=" + id,
            method: "GET",
        }).done(function(response) {
            alert(response);
            location.reload();
        });

    }

    function obrisiPorudzbinu(id) {


        $.ajax({
            url: "obrisiPorudzbinu.php?id=" + id,
            method: "GET",
        }).done(function(response) {
            alert(response);
            location.reload();
        });

    }

    function isporuciPorudzbinu(id) {


        $.ajax({
            url: "isporuciPorudzbinu.php?id=" + id,
            method: "GET",
        }).done(function(response) {
            alert(response);
            location.reload();
        });

    }

       function obrisiIzkorpe(proizvod) {

            $.ajax({
                url: "izbaciIzkorpe.php?id=" + proizvod,
                method: "GET",
            }).done(function(response) {
                alert("Proizvod uspesno izbacen iz korpe! " + response);
                location.reload();
            });

        }
