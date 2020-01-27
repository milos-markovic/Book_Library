
<?php include '../../include/header.php';?>


<div class="container py-5">

<h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


        <h1 class="display-4 text-center">Autori</h1><hr>

        <div class="clearfix mb-3">
            <a href="createBookAutor.php" class="btn btn-info float-right">Unesi Novoog Autora</a>
        </div>
        

        <?php include '../../Include/showMessages.php';?>
  

        <div class="card bg-light mb-5 p-4">
                <table class="table table-hover m-0 text-center" id="autorsTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Ime </th>
                            <th>Prezime</th>
                            <th>Titula</th>
                            <th>Datum rođenja</th>
                            <th>Biografija</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bookAutors as $autor) :?>
                        <tr>
                            <td><img src="<?php echo '../../asets/autor_img/'.$autor->img; ?>" alt="autor_image" class="img-thumbnail autor_img"></td>
                            <td><?php echo $autor->first_name; ?></td>
                            <td><?php echo $autor->last_name; ?></td>
                            <td><?php echo $autor->title; ?></td>
                            <td><?php echo formatDate($autor->date_of_birth); ?></td>
                            <td class="text-justify text-center">
                                <p><?php echo showMore($autor->biography) ?></p>
                            
                                <a href="" class="btn btn-outline-dark btn-sm">Prikazi više</a>
                            </td>
                            <td><a href="updateBookAutor.php?id=<?php echo $autor->id; ?>" class="btn btn-primary btn-sm">Izmeni</a></td>
                            <td><a href="deleteBookAutor.php?id=<?php echo $autor->id; ?>" class="btn btn-danger btn-sm">Obriši</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
             
        </div>
   
</div>


<?php include '../../include/footer.php';?>

<script>
    $(document).ready( function () {
        $('#autorsTable').DataTable();
    });
</script>

