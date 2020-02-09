<?php require 'header.php'; ?>
<style>
    #features {
        margin-top:20px;
    }
    .feature, .feature i, .feature h3, .feature .title_border {
        -webkit-transition: all 1s ease-in-out;
        -moz-transition: all 1s ease-in-out;
        -o-transition: all 1s ease-in-out;
        transition: all 1s ease-in-out;
    }
    .feature {
        background:#FFFFFF;
        text-align:center;
        padding:20px;
        border: solid 1px #cccccc;
    }
    .feature p {
        margin-top:20px;
        margin-bottom:30px;
    }
    .feature i{
        font-size:80px;
        color:#FFFFFF;
        background:rgb(204,74,20);
        padding:30px;
        border-radius:50%;
        border: solid 3px rgb(204,74,20);
    }
    .feature h3 {
        color:rgb(204,74,20);
    }
    .feature:hover {
        background:#F5F5F5;
    }
    .feature:hover i{
        color:rgb(204,74,20);
        border-color:rgb(204,74,20);
        background:#FFFFFF;
    }
    .feature:hover .title_border {
        background-color:rgb(204,74,20);
        width:50%;
    }
    .feature .title_border {
        width: 0%;
        height: 3px;
        background:rgb(204,74,20);
        margin: 0 auto;
        margin-top: 12px;
        margin-bottom: 8px;
    }
</style>

<script type="text/javascript">
    
function brisanje(apartman) {

        $.ajax({
            url: "form_handler.php?action=2",
            type: "POST",
            data: { 
            'apartman': apartman,
            },
            success: function(deleted){
                $("#apartman_"+apartman).remove();
            }
        });



}

</script>

<div class="container" id="features">
    <div class="page-header text-center">
        <h1>Administracija</h1>

    </div>


 <div class="row" style="text-align: center;">
     <a class = "btn  btn-success" href="apartmani.php">apartmani</a><br><br>
     <a class = "btn  btn-danger" href="gosti.php">gosti</a><br><br>
     <a class = "btn  btn-warning" href="drzave.php">Drzave</a><br><br>
     <a class = "btn  btn-info" href="statistika_apartmani.php">Statistika apartmani</a><br><br>
     <a class = "btn  btn-primary" href="statistika_drzave.php">Statistika gosti</a><br><br>
</div>
 
               
</div>

<?php require 'footer.php'; ?>