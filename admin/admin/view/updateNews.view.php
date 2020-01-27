
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="news.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center">Izmenite Vest: <?php echo $getNews->title; ?></h1>

    <div class="row py-5">


        <div class="col-4">

            <img src="../../asets/news_img/<?php echo $getNews->img; ?>" alt="autor image" class="img-thumbnail img-fluid">

        </div>

        <div class="col-8">


            <?php  include '../../Include/showMessages.php';?>


            <form action="" method="POST" enctype="multipart/form-data" id="updateNews">

                <input type="hidden" name="newsId" value="<?php echo $getNews->id; ?>" >

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="naslov" id="naslov" class="form-control" value="<?php echo $getNews->title; ?>" required>
                </div>
                <div class="form-group">
                    <label for="News">News:</label>
                    <textarea name="vest" id="vest" cols="30" rows="10" class="form-control" required ><?php echo $getNews->news; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="autor">Autor:</label>
                    <input type="text" name="autor" id="autor" class="form-control" value="<?php echo $getNews->autor; ?>" required >
                </div>     
                <div class="form-group">
                    <label for="slika">Unesite sliku:</label>
                    <input type="file" name="slika" id="slika" class="form-control-file" >
                    <p class="mt-1"><b> * Nije obavezno polje </b></p>
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="update" value="Izmeni" class="btn btn-info">
                </div>
            </form>
        
        </div>
    
    </div>
    
</div>


<?php include '../../include/footer.php';?>


<script>

    
    $("#updateNews").validate();    


</script>






