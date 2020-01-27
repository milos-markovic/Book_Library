<?php require '../include/publicHeader.php'; ?>


    <div class="container">
    
        <h1 class="display-4 text-center text-primary mt-4 font-weight-bold">Vesti </h1>

        <?php foreach($getNews as $news) :?>

            <div class="card bg-transparent news" id="<?php echo $news->title; ?>">
                <div class="card-header text-center text-white news-header bg-primary plava-pozadina">
                    <h4><?php echo $news->title; ?></h4>
                    <div class="text-right">
                        Napravljeno: <?php echo formatDate($news->date).' god.'; ?>
                    </div>
                </div>
                <div class="row no-gutters bg-white">
                    <div class="col-md-4">
                        <img src="../asets/news_img/<?php echo $news->img; ?>" class="card-img img-fluid img-thumbnail" alt="slika vesti">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><?php echo $news->news; ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-dark text-right font-weight-bold">
                    Napisao:&nbsp; <i><?php echo $news->autor; ?></i>
                </div>
            </div>
        
        <?php endforeach; ?>

    </div>

    
<?php require '../include/public_footer.php'; ?>