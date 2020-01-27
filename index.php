<?php require 'bootstrap.php';?>


    <?php
        $lastInsertBooks = $book->getLastInsertBooks();

        $childrenBooks = $book->getBooksByGenre("Knjige za decu");
        $lastNews = $news->getLastNews();

    ?>



<?php include 'include/publicHeader.php';?>

<div id="carosel">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="asets/carousel/001.jpg" alt="Veštac">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="asets/carousel/002.jpg" alt="BusPopust">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="asets/carousel/003.jpg" alt="Martin">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>

<div id="first_section" class="text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <div class="card m-0 p-0">

                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="fas fa-money-bill-alt" style="width:150%;font-size: 200%;"></i>
                        </div>
                        <div class="col">
                            <h5>Plaćanje</h5>
                            <p class="m-0 font-italic">Plaćanje prilikom isporuke</p>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="col">
                <div class="card">

                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="fas fa-shuttle-van" style="width:150%;font-size: 200%;"></i>
                        </div>
                        <div class="col">
                            <h5>Zagarantovan povrat novca</h5>
                            <p class="m-0 font-italic">100% povrat novca</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col">
                <div class="card">

                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="fas fa-undo" style="width:150%;font-size: 200%;"></i>
                        </div>
                        <div class="col mr-2">
                            <h5>Besplatna dostava</h5>
                            <p class="m-0 font-italic">Za robu u vrednosti od preko 1000 din</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card">

                    <div class="row align-items-center">
                        <div class="col-3">
                            <i class="fas fa-phone-volume" style="width:150%;font-size: 200%;"></i>
                        </div>
                        <div class="col">
                            <h5>Pomoć i podrška</h5>
                            <p class="m-0 font-italic">Nazovite nas:<br> 011/534 - 297</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div id="second-section" class="py-5 bg-primary">

    <div class="container">

        <h2 class="text-light text-center mb-4 font-italic">Kod Nas možete naći knjige svih žanrova</h2>

        <div style="height: 400px;">
            <div class="row h-100 ">
                <div class="col-3 h-100">

                    <div class="card  text-white h-100 img1">
                        <div class="text p-2">
                            <h5>Putopisne knjige</h5>
                        </div>
                    </div>

                </div>
                <div class="col-9 h-100">

                    <div class="row h-50 p-0 pb-4">
                        <div class="col-4 h-100">

                            <div class="card bg-dark text-white h-100 img2">
                                <div class="text p-2">
                                    <h5>Filozofija</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-8 h-100">

                            <div class="card text-white h-100 img3">
                                <div class="text p-2">
                                    <h5>Literatura vezana za internet i računare</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row h-50 p-0">
                        <div class="col-8 h-100">

                            <div class="card text-white h-100 img4">
                                <div class="text p-2">
                                    <h5>Stručana literatura</h5>
                                </div>   
                            </div>
                            
                        </div> 
                        <div class="col-4 h-100 text-white">

                            <div class="card  text-white h-100 img5">
                                <div class="text p-2">
                                    <h5>Najpoznatiji romani</h5>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div id="zadnje-knjige" class="py-5">

    <div class="container">
    
        <h2 class="text-center mb-4 font-italic">Najnovije Knjige</h2>

        <div class="owl-carousel owl-theme">

            <?php foreach( $lastInsertBooks as $getBook ) :?>

                <div class="ml-2 mr-2">
                    
                <a href="public/book.php?id=<?php echo $getBook->id; ?>" class="text-decoration-none text-dark">
                    <div class="card bg-transparent m-0 border border-dark text-center">
                        <img src="asets/book_img/<?php echo $getBook->img; ?>" alt="alt-knjiga" class="card-img-top img-fluid" style="height:200px;"> 
                        <div class="card-body" style="height: 120px;">
                            <h6 class="card-title  font-weight-bold"><?php  echo $getBook->name; ?></h6>
                            <span class="font-italic text-secondary font-weight-bold"><?php  echo $getBook->autors; ?></span>
                        </div>
                    </div>
                </a>

                </div>
   
            <?php endforeach; ?>

        </div>
    
    </div>
</div>

<div id="knjige-za-decu" class="py-5">
    <div class="container">
        
        <h2 class="text-center mb-4 font-italic text-light">Najnovije knjige za decu</h2>

        <div class="owl-carousel owl-theme">

            <?php foreach( $childrenBooks as $getBook ) :?>

                <div class="ml-2 mr-2">

                    <a href="public/book.php?id=<?php echo $getBook->id; ?>" class="text-decoration-none">
                        <div class="card bg-transparent m-0 text-center border border-white">
                            <img src="asets/book_img/<?php echo $getBook->img; ?>" alt="alt-knjiga" class="card-img-top img-fluid" style="height:200px;"> 
                            <div class="card-body" style="height: 120px;">
                                <h6 class="card-title  font-weight-bold text-white"><?php  echo $getBook->name; ?></h6>
                                <?php foreach($getBook->autors as $autor) :?>
                                    <span class="font-italic text-white font-weight-bold"><?php  echo $autor->autor; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </a>

                </div>

            <?php endforeach; ?>

        </div>

    </div>
</div>


<div id="zadnje-vesti" class="py-5">
    <div class="container">

        <h2 class="text-center mb-4 font-italic text-dark">Najnovije vesti</h2>

        <div class="row my-4">
            <?php foreach($lastNews as $news) :?>
                <div class="col-md-6">

                    <div class="card mb-3 bg-transparent border border-secondary">
                        <div class="row no-gutters p-0" style="height: 250px;">
                            <div class="col-md-4 h-100">
                                <img src="asets/news_img/<?php echo $news->img; ?>" class="card-img img-fluid h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $news->title; ?></h5>
                                    <p class="card-text"><?php echo showMore( $news->news ); ?></p>
                                    <p class="card-text text-right">
                                         <?php echo $news->autor; ?>
                                    </p>
                                    <p><a href="public/news.php#<?php echo $news->title; ?>" class="btn btn-dark font-italic">Pogledaj detaljnije</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>


<div id="testemonials" class="py-5">
    <div class="container">

        <h2 class="text-center mb-4 font-italic text-white">Naši kupci o nama</h2>

        <div class="row">

            <div class="col-md-3">
                
                <div class="card bg-transparent border border-0 text-light">
                    <div class="card-body">
                       
                        <img src="asets/testemonial_img/Bogdan.jpg" class="fluid-img testemonial-images text-center img-thumnails rounded-circle" alt="alt-testemonial-image">
                        <blockquote class="blockquote mt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer text-warning font-weight-bold mt-2">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                
                <div class="card bg-transparent border border-0 text-light">
                    <div class="card-body">
                        <img src="asets/testemonial_img/Branka.jpg" class="fluid-img testemonial-images rounded-circle" alt="alt-testemonial-image">
                        <blockquote class="blockquote mt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer text-warning font-weight-bold mt-2">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                
                <div class="card bg-transparent border border-0 text-light">
                    <div class="card-body">
                        <img src="asets/testemonial_img/Dusica.jpg" class="fluid-img testemonial-images rounded-circle" alt="alt-testemonial-image">
                        <blockquote class="blockquote mt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer text-warning font-weight-bold mt-2">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                
                <div class="card bg-transparent border-0 text-light">
                    <div class="card-body">
                        <img src="asets/testemonial_img/Branko.jpg" class="fluid-img testemonial-images rounded-circle" alt="alt-testemonial-image">
                        <blockquote class="blockquote mt-2">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer text-warning font-weight-bold mt-2">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>




<?php include 'include/public_footer.php';?>


<script>

$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      autoplay: true,
      autoplayHoverPause: true,
      items: 5,
      nav: true,
      dots: true,
      loop: true
  });
});

$("#commentForm").validate();

</script>