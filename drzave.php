<?php require 'header.php'; ?>

<?php if (!isset($_SESSION['nivo'])) die("Morate biti ulogovani!"); ?>
<?php if ($_SESSION['nivo'] < 1) die("Pristup Vam nije dozvoljen!"); ?>


<style>
    tr {
        color: black;
    }

    .row_selected td {
        background-color: #d3d3d3 !important;
    }
</style>
<script type="text/javascript" language="javascript" >

    $(document).ready(function() {
        $('#drzave').DataTable( {
            "processing": true,
            "serverSide": true,
            "language": {
                "url": "DataTables/i18n/serbian.json"
            },
            "ajax":{
                url :"drzaveJSON.php",
                type: "get",
                error: function(){
                    alert ('AJAX error');
                }
            }
        } );
    });
</script>

<div class="container">
    <div class="page-header text-center">
        <h1>Drzave</h1>
    </div>
                   <table id="drzave" class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Geografska sirina</th>
                        <th>Geografska duzina</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

</div>

<?php require 'footer.php'; ?>