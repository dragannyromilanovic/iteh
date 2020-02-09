<!doctype html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="kolicina" content="Dragan Milanovic">
        <title>Booking BNB</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-static/">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script src="js/moje.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>


        <?php session_start(); ?>
        <?php require_once 'model/gost.php'; ?>
        <?php require_once 'model/apartman.php'; ?>
        <?php require_once 'model/drzava.php'; ?>
        <?php require_once 'model/grad.php'; ?>
        <?php require_once 'model/rezervacija.php'; ?>
        <style>
            .row_selected td {
                background-color: #d3d3d3 !important;
            }


        </style>


        <!--        DataTables JS and CSS-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

        <!--        JEditable-->
        <script src="DataTables/extensions/jeditable/jquery.jeditable.js"></script>
        <script src="DataTables/extensions/editable/jquery.dataTables.editable.js"></script>

        <!--        DT BootStrap Integration-->
        <script src=" https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            tr {
                color: black;
            }

            .row_selected td {
                background-color: #d3d3d3 !important;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.3/examples/navbar-static/navbar-top.css" rel="stylesheet">
    </head>
    <body>


    <?php require 'menu.php'; ?>


    <main role="main" class="container">
        <div class="jumbotron">


