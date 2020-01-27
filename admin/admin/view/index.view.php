
<?php include '../../include/header.php';?>

    <div class="container py-5">

        <div class="row">

            <div class="col-4">

                <div class="card admin-meni card-shadow  mb-5" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="users.php"><i class="fas fa-user-friends"></i>&nbsp;  Korisnici</a>
                        </li>
                        <li class="list-group-item">
                            <a href=""><i class="fas fa-atlas"></i>&nbsp; Knjige</a>
                            <ul class="list-group list-group-flush mt-2">
                                <li class="list-group-item"><a href="bookGenres.php"><i class="fas fa-font"></i> &nbsp; Žanrovi knjiga</a></li>
                                <li class="list-group-item"><a href="bookLanguages.php"><i class="fas fa-language"></i> &nbsp; Jezici knjiga</a></li>
                                <li class="list-group-item"><a href="bookAutors.php"><i class="fas fa-user-tie"></i> &nbsp; Autori knjiga</a></li>
                                <li class="list-group-item"><a href="bookWarehouses.php"><i class="fas fa-archive"></i> &nbsp; Skladišta knjiga</a></li>
                                <li class="list-group-item"><a href="books.php"><i class="fas fa-book-open"></i> &nbsp; Knjige</a></li>
                                <li class="list-group-item"><a href="comments.php"><i class="fas fa-comments"></i> &nbsp; Komentari</a></li>
                                <li class="list-group-item"><a href="orders.php"><i class="fas fa-truck-moving"></i> &nbsp; Porudžbine</a></li>
                                <li class="list-group-item"><a href="menus.php"><i class="fas fa-list"></i> &nbsp; Meni</a></li>
                            </ul>
                        </li>
                        <li class="list-group-item">
                            <a href="news.php"><i class="fas fa-newspaper"></i>&nbsp; Novosti</a>
                        </li>
                    </ul>

                </div>

            </div>

            <div class="col-8">
        
                <div class="row p-0">

                    <?php foreach( $categories as $category): ?>

                        <div class="col-md-4 mb-4">

                            <a href="<?php echo $category['link']; ?>" class="text-decoration-none"> 

                                <div class="card text-center text-light <?php echo $category['pozadina']; ?>">
                            
                                        <div class="card-header">
                                            <h5><?php echo $category['ime kategorije']; ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $category['ikona']; ?>&nbsp;  <?php echo $category['broj elemenata']; ?></h4 >
                                        </div>
                                
                                </div>
                                
                            </a>

                        </div>

                    <?php endforeach; ?>

                </div>
                
            </div>

        </div>
       
    </div>

<?php include '../../include/footer.php';?>



