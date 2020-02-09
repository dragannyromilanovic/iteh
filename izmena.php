<?php require 'header.php'; ?>
<?php
$apartman = apartman::dajapartman(trim($_GET['id']));
?>   

<div class="container">
    <div class="page-header text-center">
        <h1>eNyro</h1>
        <h2>Izmena apartmana <?php echo $apartman->title; ?></h2>
    </div>


    <form action="controller/izmenaapartmana" method = "post" id="dodaj_slika" enctype="multipart/form-data">

                <label class="col-sm-1 control-label" for="title">Naziv</label>  <br/>
                <input id="title" name="title" value="<?php echo $apartman->title; ?>" class="form-control input-sm" required="" type="text">
                <input type="hidden" name="apartman_id" value="<?php echo $apartman->id;?>">
                <br/>
        <label class="col-sm-1 control-label" for="kolicina">Povrsina</label>
        <input id="kolicina" name="kolicina" value="<?php echo $apartman->kolicina; ?>" class="form-control input-sm" required="" type="text">

        <br/>
                <label class="col-sm-1 control-label" for="opis">Opis</label><br/>

                <textarea class="form-control" id="opis"  rows="4" value="<?php echo $apartman->opis; ?>" required name="opis"><?php echo $apartman->opis; ?></textarea>

                <br/>
                <label class="col-sm-1 control-label" for="category">grad</label>

                <select id="grad" name="grad" class="form-control">
                    <?php
                    $gradovi = grad::dajGradove();
                    while($grad = $gradovi->fetch_object()) { ?>
                        <option value="<?php echo $grad->id; ?>" ><?php echo $grad->naziv; ?></option>
                    <?php } ?>
                </select>
                <br/>

                <label class="col-sm-1 control-label" for="drzava">Drzava</label>

                <select id="drzava" name="drzava" class="form-control">
                <?php
                $drzave = Drzava::dajDrzave();

                while($drzava = $drzave->fetch_object()) { ?>
                     <option value="<?php echo $drzava->id; ?>" ><?php echo $drzava->naziv; ?></option>
                <?php } ?>
                     
                </select>
                
                <br/>

                <label class="col-sm-1 control-label" for="price">Cena</label>  <br/>

                <input id="price" name="price" value="<?php echo $apartman->price; ?>" class="form-control input-sm" required="" type="number">
                <br/>
                <label class="col-sm-1 control-label" for="Rezervisano">Rezervisano</label>  <br/>

                <input id="Rezervisano" name="Rezervisano" placeholder="Broj apartmana" class="form-control input-sm" required=""  value="<?php echo $apartman->rezervisano; ?>"type="number">
                <br/>

                <label class="col-sm-1 control-label" for="slika">Slika</label>  <br/>

                <input type="file" name="slike[]"  class="polje" id="slika" /><br/>
                <br/>

                <label class="col-sm-1 control-label" for="unos"></label><br/>

                 <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Sacuvati">

    </form>

    
</div>

<?php require 'footer.php'; ?>