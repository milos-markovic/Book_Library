
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center">Jezici Knjiga</h1><hr>


    <div class="row justify-content-around mt-5">

        <div class="col-5">

            <div class="card border border-secondary">
                <table class="table table-hover m-0 text-center">
                    <thead class="">
                        <tr>
                            <th>Jezik</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach($bookLanguages as $language) :?>
                        <tr>
                            <td><?php echo $language->name; ?></td>
                            <td><a href="deleteLanguage.php?id=<?php echo $language->id; ?>" class="btn btn-danger btn-sm">Obriši</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>  
            </div>

        </div>


        <div class="col-5">

            <div class="card">
                <div class="card-header bg-dark text-warning ">
                    Unesite jezik
                </div>
                <div class="card-body">

                    <?php include '../../Include/showMessages.php';?>

                    <form action="" method="POST" class="form-inline" id="bookLanguages">
                        <div class="form-group">
                            <label for="genre"></label>
                            <input type="text" name="jezik" id="language" class="form-control" placeholder = "Jezik" required >
                        </div>
                        <div class="form-group">
                            <input type="submit" name="createLanguage" value="Unesi" class="btn btn-outline-primary ml-3">
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    
   
</div>


<div>
    <?php include '../../include/footer.php';?>
</div>


<script>
    $("#bookLanguages").validate();
</script>
        

        