<?php require 'header.php'; ?>
<script>
    $(document).ready(function() {
        $("#gosti").dataTable({
            "language": {
                "serverSide": false,
                "url": "DataTables/i18n/serbian.json"
            }
        }).makeEditable({
            sUpdateURL: "izmena_dt.php",
            sDeleteURL: "http://enyro.localhost.com/API/obrisi_kupca",
            sDeleteHttpMethod: "POST"
        });
    });
</script>

<div class="container">
    <div class="page-header text-center">
        <h1>gosti</h1>
        <button id="btnDeleteRow" class="btn btn-danger">Obriši</button>
    </div>

   
                <table id="gosti" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>Ime</th>
                            <th>Email</th>
                            <th>Adresa</th>
                            <th>Datum registracije</th>
                            <th>Drzava</th>
                            <th>Pol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $osobe = gost::dajSve();

                        while ($red = mysqli_fetch_array($osobe)) {
                            ?>
                            <tr id="<?php echo $red['gost_id']; ?>" class = "warning">
                                <td ><?php echo $red['ime']; ?></td>
                                <td ><?php echo $red['email']; ?></td>
                                <td ><?php echo $red['adresa']; ?></td>
                                <td ><?php echo $red['datum_registracije']; ?></td>
                                <td ><?php echo $red['naziv']; ?></td>
                                <td ><?php
                                    switch ($red['pol']) {
                                        case 1:
                                            echo 'Musko';
                                            break;
                                        case 0:
                                            echo 'Zensko';
                                            break;
                                        default:
                                            echo 'Nije definisano';
                                            break;
                                    }
                                    ?></td>
                              
                            </tr>
        <?php
    }
    ?>
                    </tbody>


                </table>
                
  

</div>

<?php require 'footer.php'; ?>