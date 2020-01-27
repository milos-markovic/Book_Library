
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="bookAutors.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center">Izmenite Autora</h1>

    <div class="row py-5">

        <div class="col-4">

            <img src="../../asets/autor_img/<?php echo $bookAutor->img; ?>" alt="autor image" class="img-thumbnail">

        </div>

        <div class="col-8">

            <?php include '../../Include/showMessages.php';?>


            <form action="" method="POST" enctype="multipart/form-data" id="updateBookAutor">

                <input type="hidden" name="autorId" value="<?php echo $bookAutor->id; ?>" >
                
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime" class="form-control" value=<?php echo $bookAutor->first_name; ?> required >
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:</label>
                    <input type="text" name="prezime" id="prezime" class="form-control" value="<?php echo $bookAutor->last_name; ?>" required >
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="titula" id="titula" class="form-control" value="<?php echo $bookAutor->title; ?>" required >
                </div>
                <div class="form-group">
                    <label for="datum_rodjenja">Datum Rođenja:</label>
                    <input type="text" name="datum_rodjenja" id="datum_rodjenja" class="form-control" value=<?php echo $bookAutor->date_of_birth; ?> required >
                </div>
                <div class="form-group">
                    <label for="biografija">Biografija:</label>
                    <textarea name="biografija" id="biografija" cols="30" rows="10" class="form-control" required ><?php echo $bookAutor->biography; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="slika">Biografija:</label>
                    <input type="file" name="slika" id="slika" class="form-control-file" >
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="update" value="Promeni" class="btn btn-primary">
                </div>
            </form>
        
        </div>
    
    </div>
    
</div>


<?php include '../../include/footer.php';?>


<script>
    $( function() {
        $( "#datum_rodjenja" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );

    $("#updateBookAutor").validate();
</script>







