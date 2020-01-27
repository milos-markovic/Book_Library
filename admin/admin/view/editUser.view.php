
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="users.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


  

    <h1 class="display-4 mb-5 text-center">Izmena Korisnika: <?php echo $updateUser->first_name.' '.$updateUser->last_name; ?></h1>
        
    <div class="row pb-5">

        <div class="col-3">
            <img src="<?php echo !empty($updateUser->img) ? '../../asets/user_img/'.$updateUser->img : '../../asets/user_img/default_avatar.png' ;?>" alt="user-image" class="img-thumbnail" >
        </div>

        <div class="col-9">

            <?php include '../../Include/showMessages.php';?>
            
            <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="userId" value="<?php echo $updateUser->id; ?>" />

                <div class="form-group">
                    <label for="korisničko_ime">Korisnicko Ime: </label>
                    <input type="text" class="form-control" id="korisničko_ime" name="korisničko_ime" placeholder="Korisnicko Ime" value="<?php echo $updateUser->username; ?>">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="ime">Ime: </label>
                            <input type="text" class="form-control" id="ime" name="ime" placeholder="Ime" value="<?php echo $updateUser->first_name; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="prezime">Prezime: </label>
                            <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Prezime" value="<?php echo $updateUser->last_name; ?>" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $updateUser->email; ?>" >
                </div>
                <div class="form-group">
                    <label for="lozinka">Lozinka: </label>
                    <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Lozinka" value="<?php echo $updateUser->password; ?>" >
                </div>
                <div class="form-group">
                    <label for="telefon">Telefon: </label>
                    <input type="text" class="form-control" id="telefon" name="telefon" placeholder="Telefon" value="<?php echo $updateUser->phone; ?>">
                </div>
                <div class="form-group">
                    <label for="datum_rođenja">Datum Rodjenja: </label>
                    <input type="text" id="datum_rođenja" name="datum_rođenja" class="form-control" placeholder="Datum Rođenja" value="<?php echo $updateUser->date_of_birth; ?>"  >
                </div>
                <div class="form-group pb-5" id="addressElements">

                    <div id="insertAddressField"> 
                        <label for="">Adrese:</label>
                        <?php foreach( $updateUser->addresses as $addressNumber => $address ): ?>
                            <div class="form-row justify-content-end">
    
                                <div class="col-md-4">
                                    <label for="ulica">Ulica: </label>
                                    <input type="text" name="adresa[<?php echo $addressNumber; ?>][ulica]" id="ulica" class="form-control" value="<?php echo $address->street; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="grad">Grad:</label>
                                    <input type="text" name="adresa[<?php echo $addressNumber; ?>][grad]" id="grad" class="form-control" value="<?php echo $address->city; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="drzava">Drzava:</label>
                                    <input type="text" name="adresa[<?php echo $addressNumber; ?>][drzava]" id="drzava" class="form-control" value="<?php echo $address->country; ?>">
                                </div>
                                <div class="col-md-1">
                                
                                    <a href="" class="btn btn-sm btn-danger btn_delete_address" id="btn-deleteAddress" >Obriši</a>
                                    
                                </div>
                                    
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <input type="hidden" id="brojacAdresa"  value="0" />

                    <a href="#" class="btn btn-sm btn-warning float-right mt-3" id="dodajAdresu" ><i class="fas fa-plus-circle"></i> Dodaj adresno polje</a>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="tip_korisnika">Tip Korisnika: </label>
                            <select id="tip_korisnika" class="form-control" name="tip_korisnika">
                                <?php foreach($usertypes as $usertype): ?>

                                    <option value=<?php echo $usertype->id; ?> <?php echo ($usertype->name == $updateUser->usertype) ? 'selected' : ''; ?> >
                                        <?php echo $usertype->name;?>
                                    </option>
                                    
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="clanarina">Članarina: </label>
                            <select id="clanarina" class="form-control" name="članarina" >
                                <?php foreach($memberships as $membership): ?>

                                    <option value=<?php echo $membership->id; ?> <?php echo ($membership->name == $updateUser->membership) ? 'selected' : ''; ?> >
                                        <?php echo $membership->name;?>
                                    </option>
                                    
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="img">Promenite Profilnu sliku:</label>
                    <input type="file" class="form-control-file" id="img" name="img">
                    <p class="pt-2" ><strong> * Nije obavezno polje </strong></p>
                </div>
                <div class="form-group text-center mt-3">
                    <input type="submit" name="update" value="Izmeni Korisnika" class="btn btn-primary" >
                </div>

            </form>

        </div>

    </div>

        

    <!-- </div> -->
   
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





