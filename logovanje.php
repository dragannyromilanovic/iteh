<?php require 'header.php'; ?>

<div class="container">
    <div class="page-header text-center">
        <h1>eNyro</h1>
    </div>

    									<form role="form" action="controller/logovanje" method="post" id="login-form" autocomplete="off">
                                        <div class="form-group">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Vasa email adresa..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="key" class="sr-only">Password</label>
                                            <input type="password" name="password" id="key" class="form-control" placeholder="Vasa lozinka..." required>
                                        </div>
                                        <input type="submit" id="btn-login" name="login" class="btn btn-success btn-custom btn-lg btn-block" value="Uloguj">
                                    </form>

</div>

<?php require 'footer.php'; ?>