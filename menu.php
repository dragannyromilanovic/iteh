<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="index.php">Milanovic BNB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">Pocetak <span class="sr-only">(current)</span></a>
            </li>



                <?php
                $gradovi = grad::dajGradove();

                while($grad = $gradovi->fetch_object()) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="apartmani_gradovi.php?id=<?php echo $grad->id; ?>"> <?php echo $grad->naziv; ?> </a>
                    </li>

                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="rezervacija.php">Rezervacija</a>
                </li>


            <?php if(isSet($_SESSION['email'])) { ?> <!--            Ulogovani  -->


                <li class="nav-item">
                    <a class="nav-link" href="rezervacije.php">Moje rezervacije</a>
                </li>




                <?php if($_SESSION['nivo'] > 0) { ?> <!--                Administracija-->


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administracija</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="apartmani.php">apartmani</a>
                            <a class="dropdown-item" href="rezervacije.php">rezervacije</a>
                            <a class="dropdown-item" href="gosti.php">gosti</a>
                            <a class="dropdown-item" href="drzave.php">Drzave</a>
                            <a class="dropdown-item" href="statistika_apartmani.php">Stanje rezervacija</a>
                            <a class="dropdown-item" href="statistika_gosti.php">Mapa gosta</a>
                        </div>
                    </li>

                <?php } ?> <!--                !Administracija-->

                <li class="nav-item">
                    <a class="nav-link"  href="controller/logout">Logout</a>
                </li>

            <?php } else { ?>  <!--            !Ulogovani  -->

        </ul>
                <form class="form-inline mt-2 mt-md-0" action="controller/logovanje" method="post" >
                    <input class="form-control mr-sm-2" type="email" placeholder="Email" name="email" aria-label="Email" required>
                    <input class="form-control mr-sm-2" type="password" placeholder="Lozinka" name="password" aria-label="Lozinka" required>
                    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Ulaz">

                </form>
        <a href="registracija.php" class="btn btn-outline-success my-2 my-sm-0">Registracija</a>

            <?php } ?>





    </div>
</nav>