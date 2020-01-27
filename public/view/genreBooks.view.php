<?php require '../include/publicHeader.php'; ?>


    <div class="container">
    
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="books.php">Knjige</a></li>
                <li class="breadcrumb-item active" aria-current="page">Knjige izabrane po žanru</li>
            </ol>
        </nav>

        <div class="row align-items-top justify-content-between mt-4 mb-5 ">
        
            <div class="col-3">
            
                <ul class="list-group list-unstyled book-meni" style="width: 17rem;">
 
                    <?php foreach($genres as $genre) :?>
 
                     
                        <li class="list-group-item list-group-item-action list-group-item-primary text-light card-shadow">
                            <a href="genreBooks.php?id=<?php echo $genre->id; ?>" class="text-decoration-none d-flex align-items-center justify-content-between">
                                <?php echo $genre->name; ?> 
                                <span class="border border-primary px-3 py-2  rounded-circle  text-light font-weight-bold"><?php echo $genre->numberOfBooks; ?></span> 
                            </a> 
                            
                        </li>
                    
                     
                    <?php endforeach; ?>
                    
                </ul>
            
            </div>

            <div class="col-9">
            
                <h1 class=" mb-5 text-center text-primary font-weight-bold">Žanr: <?php echo $getGenre->name; ?></h1>

                <div class="row m-0">
                
                    <?php foreach( $getBooksPerGenre as $book ) :?>
                        <div class="col-3 mb-4">
                        
                            <a href="book.php?id=<?php echo $book->id; ?>" class="text-decoration-none text-dark">

                                <div class="card text-center bg-transparent border no-border " >
                                    <img src="../asets/book_img/<?php echo $book->details->img; ?>" class="card-img-top img-fluid" style="height:220px;" alt="alt-slika-knjige">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $book->details->name; ?></h5>
                                        <p class="card-text h6">
                                            <?php foreach( $book->details->autors as $autor ) :?>

                                                <i><?php echo $autor->autor; ?></i>

                                            <?php endforeach; ?>
                                        </p>
                                    </div>
                                </div>

                            </a>
                        
                        </div>

                    <?php endforeach; ?>

                </div>
            
            </div>

        </div>

        <?php if( $totalBooks > 12 ) :?>
            <nav class="mb-4">
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item"><a href="?pageno=1&id=<?php echo $getGenre->id; ?>" class="page-link" >Prva</a></li>
                    <li class="<?php if($pageno <= 1){ echo '#'; } ?> page-item">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>&id=<?php echo $getGenre->id; ?>" class="page-link" >Prethodna</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo '#'; } ?> page-item">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>&id=<?php echo $getGenre->id; ?>" class="page-link">Sledeća</a>
                    </li>
                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>&id=<?php echo $getGenre->id; ?>" class="page-link" >Zadnja</a></li>
                </ul>
            </nav>
        <?php endif; ?>

        <?php include '../include/shopingCartModal.php'; ?>

    </div>



<?php require '../include/public_footer.php'; ?>