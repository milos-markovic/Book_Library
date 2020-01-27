


<?php $image_path = "http://localhost/Book_Library/asets/book_img";?>

<div class="card mb-3 bg-dark text-warning justify-content-center" style="max-width: 540px;">
    <?php foreach( $serachResult as $book ) :?>

    <a class="text-warning text-decoration-none" href="http://localhost/Book_Library/public/book.php?id=<?php echo $book->id; ?>">
    
        <div class="row no-gutters" style="height: 120px;">
            <div class="col-md-4 h-100">
                <img src="http://localhost/Book_Library/asets/book_img/<?php echo $book->img; ?>" class="card-img img-fluid h-100" alt="...">
            </div>
            <div class="col-md-8 h-100">
                <div class="card-body ">
                    <h5 class="card-title"><?php echo $book->name; ?></h5>
                    <p class="card-text">
                        <?php foreach($book->autors as $autor) :?>
                            <?php echo $autor->autor; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
        </div>
    
    </a>
    <?php endforeach; ?>
</div>




