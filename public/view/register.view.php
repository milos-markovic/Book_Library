<?php include '../include/header.php';?>

<div class="container">

    <div class="row">
    
        <div class="col-6 mx-auto">
        
            <div class="card  mt-5 border border-secondary bg-light card-shadow" id="register" >
                <h5 class="card-header text-center bg-secondary text-warning ">Registracija: </h5>
                <div class="card-body">

                    <?php include '../include/showMessages.php'; ?>
                
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="korisničko_ime">Korisničko ime: </label>
                                    <input type="text" name="korisničko_ime" id="korisničko_ime" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="email">Email: </label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="lozinka">Lozinka: </label>
                                    <input type="password" name="lozinka" id="lozinka" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="potvrda_lozinke">Potvrdite Lozinku: </label>
                                    <input type="password" name="potvrda_lozinke" id="potvrda_lozinke" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" name="register" id="register" value="Registrujte se" class="form-control btn btn-lg btn-outline-primary p-0">
                        </div>
                    </form>
                </div>
            </div>
        
        
        </div>    
    
    </div>

</div>




<?php include '../include/footer.php';?>