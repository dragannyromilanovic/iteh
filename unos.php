<?php require 'header.php'; ?>
<div class="container">
    <div class="page-header text-center">
        <h1>eNyro</h1>
        <h2>Unos apartmana u ponudu</h2>
    </div>
    <?php if (!isset($_SESSION['nivo'])) die("Morate biti ulogovani!"); ?>
    <?php if ($_SESSION['nivo'] < 1) die("Pristup Vam nije dozvoljen!"); ?>

    <form action="controller/unosapartmana" method = "post" id="dodaj_slika" enctype="multipart/form-data">

        <label class="col-sm-1 control-label" for="title">Naziv</label>  <br/>
        <input id="title" name="title" placeholder="Unesite naziv apartmana" class="form-control input-sm" required="" type="text">

        <br/>
        <label class="col-sm-1 control-label" for="title">Povrsina</label>  <br/>
        <input id="povrsina" name="povrsina" placeholder="Povrsina u m2" class="form-control input-sm" required="" type="text">

        <br/>

        <label class="col-sm-1 control-label" for="opis">Opis</label><br/>

        <textarea class="form-control" id="opis"  rows="4" placeholder="Opis apartmana" required name="opis"></textarea>

        <br/>
        <label class="col-sm-1 control-label" for="grad">grad</label>

        <select id="grad" name="grad" class="form-control">
            <?php
            $gradovi = grad::dajGradove();

            while ($grad = $gradovi->fetch_object()) {
                ?>
                <option value="<?php echo $grad->id; ?>" ><?php echo $grad->naziv; ?></option>
<?php } ?>
        </select>

        <br/>

        <label class="col-sm-1 control-label" for="drzava">Drzava</label>

        <select id="drzava" name="drzava" class="form-control">
            <?php
            $drzave = Drzava::dajDrzave();

            while ($drzava = $drzave->fetch_object()) {
                ?>
                <option value="<?php echo $drzava->id; ?>" ><?php echo $drzava->naziv; ?></option>
<?php } ?>

        </select>

        <br/>

        <label class="col-sm-1 control-label" for="price">Cena</label>  <br/>

        <input id="price" name="price" placeholder="Cena u dinarima" class="form-control input-sm" required="" type="number">
        <br/>
        <label class="col-sm-1 control-label" for="Rezervisano">Rezervisano</label>  <br/>

        <input id="Rezervisano" name="Rezervisano" placeholder="Broj apartmana" class="form-control input-sm" required="" type="number">
        <br/>

        <label class="col-sm-1 control-label" for="slika">Slika</label>  <br/>

        <input type="file" name="slike[]"  class="polje" id="slika" /><br/>
        <br/>

        <label class="col-sm-1 control-label" for="unos"></label><br/>

        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Sacuvati">

    </form>

</div>

<?php require 'footer.php'; ?>