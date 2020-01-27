
<?php include '../../include/header.php';?>

<div class="container py-5">

    <div class="row">

        <div class="col-4">

            <div class="card admin-meni card-shadow  mb-5" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href=""><i class="fas fa-atlas"></i>&nbsp; Knjige</a>
                        <ul class="list-group list-group-flush mt-2">
                            <li class="list-group-item"><a href="comments.php"><i class="fas fa-comments"></i> &nbsp; Komentari</a></li>
                            <li class="list-group-item"><a href="orders.php"><i class="fas fa-truck-moving"></i> &nbsp; Porudžbine</a></li>
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

                    <div class="col-md-4">

                        <a href="comments.php" class="text-decoration-none"> 

           

                            <div class="card text-center text-light <?php echo $categories[7]['pozadina']; ?>">
                        
                                    <div class="card-header">
                                        <h5><?php echo $categories[7]['ime kategorije']; ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $categories[7]['ikona']; ?>&nbsp;  <?php echo $categories[7]['broj elemenata']; ?></h4 >
                                    </div>
                            
                            </div>
                            
                        </a>

                    </div>
                    <div class="col-md-4">

                        <a href="orders.php" class="text-decoration-none"> 

                            <div class="card text-center text-light <?php echo $categories[8]['pozadina']; ?>">
                        
                                    <div class="card-header">
                                        <h5><?php echo $categories[8]['ime kategorije']; ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $categories[8]['ikona']; ?>&nbsp;  <?php echo $categories[8]['broj elemenata']; ?></h4 >
                                    </div>
                            
                            </div>
                            
                        </a>

                    </div>
                    <div class="col-md-4">

                        <a href="news.php" class="text-decoration-none"> 

                            <div class="card text-center text-light <?php echo $categories[6]['pozadina']; ?>">
                        
                                    <div class="card-header">
                                        <h5><?php echo $categories[6]['ime kategorije']; ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $categories[6]['ikona']; ?>&nbsp;  <?php echo $categories[6]['broj elemenata']; ?></h4 >
                                    </div>
                            
                            </div>
                            
                        </a>

                    </div>


            </div>
            
        </div>

    </div>
   
</div>

<?php include '../../include/footer.php';?>



