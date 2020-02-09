<?php require 'header.php'; ?>

<div class="container">
    <div class="page-header text-center">
        <h1>eNyro</h1>
    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="margin-left: -16px">


                            <?php if(isset($_SESSION['korpa'])) { ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Apartman</th>
                                        <th>Check in</th>
                                        <th class="text-center">Broj noci</th>
                                        <th class="text-center">Cena</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <form method="post" id="rezervisiForma" action="rezervisi.php">

                                    <?php
                                    $ukupno = 0;
                                    $stavka = 0;
                                    foreach ($_SESSION['korpa'] as $apartman) {
                                        ?>

<input type="hidden" value="<?php echo $apartman['price']; ?>" name="apartmanId[<?php echo $apartman['id']; ?>]" id="apartmanId">
                                        <tr>
                                            <td class="col-sm-8 col-md-6">
                                                <h4 class="media-heading"><?php echo $apartman['naziv']; ?></h4>
                                            </td>
                                            <td class="col-sm-1 col-md-1" style="text-align: center"><strong><input type="date" name="check_in_<?php echo $apartman['id']; ?>" id="check_in_<?php echo $apartman['id']; ?>" placeholder="Check in"/> </strong></td>
                                            <td class="col-sm-1 col-md-1" style="text-align: center"><strong><input onchange="izracnajTotal(<?php echo $apartman['id']; ?>)" type="number" id="broj_noci_<?php echo $apartman['id']; ?>" name="broj_noci_<?php echo $apartman['id']; ?>" placeholder="Broj noci"/> </strong></td>


                                            <td class="col-sm-1 col-md-1 text-center"><strong>
                                                    <span id="cena_<?php echo $apartman['id']; ?>"><?php echo $apartman['price']; ?></span> RSD
                                            </td>
                                            <td class="col-sm-1 col-md-1 text-left"><strong><span id="total_<?php echo $apartman['id']; ?>">0</span> RSD</strong></td>
                                            <td class="col-sm-1 col-md-1">
                                                <button type="button" class="btn btn-info" onclick = "obrisiIzkorpe(<?php echo $apartman['id']; ?>)"> Izbaci
                                                </button></td>
                                        </tr>

                                        <?php
                                        $ukupno = $ukupno + $stavka;
                                    }
                                    ?>


                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>


                                    </tr>

                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>

                                        <td>
                                            <input type="submit" class="btn btn-success" value="Rezervisis">

                                        </td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>

                                 <?php } else { ?>

                                    Nemate rezervisanihapartmana.

                                 <?php }?>

                        </div>
                    </div>
                </div>

</div>

<?php require 'footer.php'; ?>