<?php require 'header.php'; ?>

<div class="container">
    <div class="page-header text-center">
        <h1>eNyro</h1>
    </div>

                            <form method="post" action = "controller/registracija">

                            <label for="kolicina">Ime i prezime:</label>
                            <br/> <input class="form-control" type="text" id="ime" name="ime" class="required input_field" required />
                            <div class="cleaner h10">
                                
                            </div>

                            <label for="email">Email:</label> <br/>
                            <input class="form-control" type="email" required class="validate-email required input_field" name="email" id="email" />
                            <div class="cleaner h10"></div>

                            <label for="subject">Lozinka:</label><br/>
                            <input class="form-control" type="password" class="validate-subject required input_field" name="password" id="password" required/>				               
                            <div class="cleaner h10"></div>

                            <label for="text">Adresa:</label><br/>
                            <textarea class="form-control" id="adresa" name="adresa" rows="0" cols="0" required class="required"></textarea>
                            <div class="cleaner h10"></div>				


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
                            Musko<input type="radio" name="pol" value="1" />  Zensko<input  type="radio" name="pol" value="0" />
                            <div class="cleaner h10"></div>
                            <hr>
                            <input class="btn btn-success btn-block" type="submit" value="Registruj" id="registruj" name="registruj" class="submit_btn float_l" />

                        </form>
</div>

<?php require 'footer.php'; ?>