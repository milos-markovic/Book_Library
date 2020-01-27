
<?php include '../../include/header.php';?>


<div class="container">

    <h5><a href="news.php" class="btn btn-link text-dark mt-4"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center  mb-3">Unesite Vesti</h1>

    <div class="row py-4">

        <div class="col-md-8 mx-auto mb-5">

            <?php include '../../Include/showMessages.php';?>


            <form action="" method="POST" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" name="naslov" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="news">News: </label>
                    <textarea name="vest" id="" cols="30" rows="8" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="autor">Autor: </label>
                    <input type="autor" name="autor" id="autor" class="form-control">
                </div>
                <div class="form-group">
                    <label for="datum">Date: </label>
                    <input type="text" name="datum" id="datum" class="form-control">
                </div>
                <div class="form-group">
                    <label for="slika">Title: </label>
                    <input type="file" name="slika" id="slika" class="form-control-file">
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="create" value="Create" id="title" class="btn btn-info">
                </div>
            </form>

        </div>
    </div>


</div>



<?php include '../../include/footer.php';?>

<script>
    $( function() {
        $( "#datum" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );

</script>





