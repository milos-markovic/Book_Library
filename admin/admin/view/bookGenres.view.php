
<?php include '../../include/header.php';?>



<div class="container py-5">

    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center">Žanrovi Knjiga</h1><hr>


    <div class="row justify-content-around mt-5">

        <div class="col-5">

        <div class="card border border-secondary">
                <table class="table table-hover m-0 text-center">
                    <thead class="">
                        <tr>
                            <th>Ime žanra</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach($genres as $genre) :?>
                        <tr>
                            <td><?php echo $genre->name; ?></td>
                            <td><a href="deleteGenre.php?id=<?php echo $genre->id; ?>" class="btn btn-danger btn-sm"> Obriši </a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>  
        </div>

        <div class="col-5">

            <div class="card border border-dark">
                <div class="card-header bg-dark text-warning ">
                    Napravite novi žanr
                </div>
                <div class="card-body">

                    <?php include '../../Include/showMessages.php';?>

                    <form action="" method="POST" class="form-inline" id="bookGenres">
                        <div class="form-group">
                            <label for="genre"></label>
                            <input type="text" name="naziv_žanra" id="naziv_žanra" class="form-control" placeholder = "Naziv žanra" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="createGenre" value="Napravi" class="btn btn-outline-primary ml-3">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
   
</div>

<div class="fixed-bottom">
    <?php include '../../include/footer.php';?>
</div>

<script>
    $("#bookGenres").validate();
</script>



