
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="bookAutors.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <div class="row py-2">
    
        <div class="col-8 mx-auto mb-4">


            <h1 class="display-4 text-center mb-4">Unesite Autora</h1>

            <?php include '../../Include/showMessages.php';?>


            <form action="" method="POST" enctype="multipart/form-data" id="bookAutors">
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:</label>
                    <input type="text" name="prezime" id="prezime" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="titula" id="titula" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="datum_rodjenja">Datum Rođenja:</label>
                    <input type="text" name="datum_rodjenja" id="datum_rodjenja" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="biografija">Biografija:</label>
                    <textarea name="biografija" id="biografija" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="slika">Biografija:</label>
                    <input type="file" name="slika" id="slika" class="form-control-file" >
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="create" value="Unesi" class="btn btn-primary">
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

    $("#bookAutors").validate();
</script>







