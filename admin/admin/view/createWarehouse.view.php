
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="bookWarehouses.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center">Napravite Skladište</h1>

    <div class="row py-4">
    
        <div class="col-8 mx-auto">

            <form action="" method="POST" id="createWarehouse">

                <?php include '../../Include/showMessages.php';?>
                
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime" class="form-control" placeholder = "Ime skladišta" required>
                </div>
                <div class="form-group">
                    <label for="adress">Adresa:</label>
                    <input type="text" name="adresa" id="adresa" class="form-control" placeholder = "Naziv Adresa" required >
                </div>
                <div class="form-group">
                    <label for="kolicina">Kolicina:</label>
                    <input type="text" name="kapacitet" id="kapacitet" class="form-control" placeholder = "Kapacitet skladišta" required >
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="grad" id="grad" class="form-control" placeholder = "Grad" required>
                </div>
                <div class="form-group text-center mt-4">
                    <input type="submit" name="create" value="Unesi" class="btn btn-info" id="warehouse_sub_btn">
                </div>
            </form>

        </div>

    </div>
    
</div>


<?php include '../../include/footer.php';?>


<script>

    $("#createWarehouse").validate();
</script>







