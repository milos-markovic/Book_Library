
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="menus.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <?php require '../../include/showMessages.php'; ?>


    <h1 class="display-4 text-center mb-5">Napravi Link: </h1>

    <div class="row">
    
        <div class="col-md-6 mx-auto">
        
            <form action="" method="POST">

                <div class="form-group">
                    <label for="title">Link title:</label>
                    <input type="text" name="title" id="title" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Link:</label>
                    <input type="text" name="link" id="link" class="form-control" >
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="createTopMenuLink" value="Napravi" class="btn btn-primary">
                </div>
            </form>

        </div>
    
    </div>
   
   
</div>



<?php include '../../include/footer.php';?>









