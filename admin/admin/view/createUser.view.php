
<?php include '../../include/header.php';?>


<div class="container py-5">

<h5><a href="users.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 mb-5 text-center">Novi Korisnik: </h1>
        

    <div class="row pb-5">


        <div class="col-9 mx-auto">


            <?php include '../../Include/showMessages.php';?>
            

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="korisničko_ime">Korisnicko ime: </label>
                    <input type="text" class="form-control" id="korisničko_ime" name="korisničko_ime" placeholder="Korisnicko Ime" value="<?php oldInput('korisničko_ime'); ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ime">Ime: </label>
                        <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime" value="<?php oldInput('ime'); ?>" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prezime">Prezime: </label>
                        <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Prezime" value="<?php oldInput('prezime'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php oldInput('email'); ?>">
                </div>
                <div class="form-group">
                    <label for="lozinka">Lozinka: </label>
                    <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Lozinka" value="<?php oldInput('lozinka'); ?>" >
                </div>
                <div class="form-group">
                    <label for="telefon">Telefon: </label>
                    <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Telefon" value="<?php oldInput('telefon'); ?>">
                </div>
                <div class="form-group">
                    <label for="datum_rođenja">Datum Rodjenja: </label>
                    <input type="text" id="datum_rođenja" name="datum_rođenja" class="form-control" placeholder="Datum rođenja" value="<?php oldInput('datum_rođenja'); ?>" >
                </div>
                <div class="form-group mb-5" id="addressElements">

                    <div id="insertAddressField"> 
                        <label for="">Adrese:</label>
                        <div class="form-row justify-content-end">

                            <div class="col-md-4">
                                <label for="ulica">Ulica: </label>
                                <input type="text" name="adresa[0][ulica]" id="ulica" class="form-control" placeholder="Ulica">
                            </div>
                            <div class="col-md-3">
                                <label for="grad">Grad:</label>
                                <input type="text" name="adresa[0][grad]" id="grad" class="form-control" placeholder="Grad">
                            </div>
                            <div class="col-md-3">
                                <label for="drzava">Drzava:</label>
                                <input type="text" name="adresa[0][drzava]" id="drzava" class="form-control" placeholder="Država">
                            </div>
                            <div class="col-md-1">
                            
                                <a href="" class="btn btn-sm btn-danger btn_delete_address" id="btn-deleteAddress">Obriši</a>
                                
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="brojacAdresa"  value="0" />

                    <a href="#" class="btn btn-sm btn-warning float-right mt-3" id="dodajAdresu" ><i class="fas fa-plus-circle"></i> Dodaj adresno polje</a>     
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="tip_korisnika">Tip Korisnika: </label>
                            <select id="tip_korisnika" class="form-control" name="tip_korisnika">
                                <option value="">izaberi ...</option>
                                <?php foreach($usertypes as $usertype): ?>

                                    <option value=<?php echo $usertype->id; ?> >
                                        <?php echo $usertype->name;?>
                                    </option>
                                    
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="clanarina">Clanarina: </label>
                            <select id="clanrina" class="form-control" name="članarina" >
                                <option value="">izaberi ...</option>
                                <?php foreach($memberships as $membership): ?>

                                    <option value=<?php echo $membership->id; ?> >
                                        <?php echo $membership->name;?>
                                    </option>
                                    
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="img">Odaberite Profilnu sliku:</label>
                    <input type="file" class="form-control-file" id="img" name="img">
                    <p class="pt-2" ><strong> * Nije obavezno polje </strong></p>
                </div>
                <div class="form-group text-center mt-3">
                    <input type="submit" name="create" value="Napravi Korisnika" class="btn btn-primary" >
                </div>

            </form>

        </div>

    </div>

</div>


<?php include '../../include/footer.php';?>


<script>

    $( function() {
        $( "#datum_rođenja" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );
    

    addAddressField();
    removeAddressField();

</script>





