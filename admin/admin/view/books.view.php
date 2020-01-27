
<?php include '../../include/header.php';?>


<div class="container py-5">


    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>

    <?php include '../../include/showMessages.php'; ?>
    

    <h1 class="display-4 mb-4 text-center">Knjige</h1><hr>

    <?php if(is_array($books)): ?>
        <div class="card mt-5 p-4">
            <table class="table table-hover text-center m-0 table_books  row-border " id="booksTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>Naslov</th>
                        <th>Autori</th>
                        <th>Žanr</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $book): ?>
                        <tr>
                            <td><img src="<?php echo '../../asets/book_img/'.$book->img; ?>" alt="book_image" class="img-fluid rounded book_img"></td>
                            <td><?php echo $book->title; ?></td>
                            <td>
                                <?php foreach($book->autors as $autor): ?>
                                    <div> <?php echo $autor->autor; ?> </div>
                                <?php endforeach;?>
                            </td>
                            <td><?php echo $book->genre; ?></td>
                            <td><a href="bookDetails.php?id=<?php echo $book->id; ?>">Detalji</a></td>
                            <td><a href="updateBook.php?id=<?php echo $book->id; ?>" class="btn btn-primary btn-sm">Izmeni</a></td>
                            <td><a href="deleteBook.php?id=<?php echo $book->id; ?>" class="btn btn-danger btn-sm">Obriši</a></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <h2>Unesite nove knjige</h2>
    <?php endif;?>

    <a href="createBook.php"class="btn btn-info mt-4 mb-5" >Unesite Knjigu</a>

</div>


<?php include '../../include/footer.php';?>

<script>

    $(document).ready( function () {
        $('#booksTable').DataTable();
    });

</script>

