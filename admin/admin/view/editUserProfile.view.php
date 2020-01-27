
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <!-- <div class="card p-5 mb-5 border border-secondary"> -->


<div class="card mt-4 mb-5 bg-white text-dark"  >
  <div class="card-header plava-pozadina p-4">
    <h5 class="m-0 text-center text-white">Profil Korisnika: <?php echo $getUser->first_name.' '.$getUser->last_name; ?></h5>
  </div>
  
  <div class="card-body bg-light">
    <div class="row no-gutters">
        <div class="col-md-4 text-center">
            <img src="<?php echo !empty( $getUser->img ) ? '../../asets/user_img/'.$getUser->img : '../../asets/user_img/default_avatar.png'; ?>" class="card-img img-fluid rounded-circle mb-2hhh" alt="korisnikova slika" style="height: 250px; width: 250px; ">

             <label for="slika">Promenite sliku</label>
             <input type="file" class="form-file-control" name="slika" id="slika">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="korisnicko_ime">Korisničko ime: </label>
                                <input type="text" name="korisnicko_ime" id="korisnicko_ime" value="<?php echo $getUser->username; ?>" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="email">Email: </label>
                                <input type="text" name="email" id="email" value="<?php echo $getUser->email; ?>" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="telefon">Telefon: </label>
                                <input type="text" name="telefon" id="telefon" value="<?php echo $getUser->phone; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                                <label for="ime">Ime: </label>
                                <input type="text" name="ime" id="ime" value="<?php echo $getUser->first_name; ?>" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="prezime">Prezime: </label>
                                <input type="text" name="prezime" id="prezime" value="<?php echo $getUser->last_name; ?>" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="datum_rodjenja">Datum Rodjenja: </label>
                                <input type="text" name="datum_rodjenja" id="date_of_birth" value="<?php echo $getUser->date_of_birth; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <?php foreach($getUser->addresses as $address ) :?>
                                <div class="col-4">
                                    <label for="ulica">Ulica: </label>
                                    <input type="text" name="ulica" id="ulica" value="<?php echo $address->street; ?>" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label for="pre">Grad: </label>
                                    <input type="text" name="grad" id="grad" value="<?php echo $address->city; ?>" class="form-control">
                                </div>
                                <div class="col-3">
                                    <label for="drzava">Država: </label>
                                    <input type="text" name="drzava" id="drzava" value="<?php echo $address->country; ?>" class="form-control">
                                </div>
                            <?php endforeach; ?>
                            <div class="col-1 mt-4 pl-4 pt-2" >
                                <a href="" class="text-light" ><i class="fas fa-trash-alt fa-2x"></i></a> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-4">
                        
                            </div>
                            <div class="col-4">
                                
                            </div>
                            <div class="col-4 text-right">
                                <a href="" class="btn btn-warning btn-sm"> <i class="fas fa-pencil-alt"></i>&nbsp; Dodaj Adresu</a>
                            </div>
                        </div>
                    </div>
            </div>    
        </div>
    </div>
  </div>

  <div class="card-footer text-center plava-pozadina">
    <a href="" class="btn btn-outline-light btn-lg">Izmeni</a>
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





