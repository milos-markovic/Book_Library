<?php require '../include/publicHeader.php'; ?>


    <div class="container">
    
        <nav aria-label="breadcrumb" id="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="books.php">Knjige</a></li>
                <li class="breadcrumb-item active"><a href="genreBooks.php?id=<?php echo $getBook->genreId; ?>">Knjige izabrane po žanru</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalji knjige</li>
            </ol>
        </nav>

        <?php require '../include/showMessages.php'; ?>

        
        <div class="row align-items-top justify-content-between pt-3 pb-5" id="smrda">
        
            <div class="col-9">
            
                <div class="row">
                
                    <div class="col-4">
                        <div class="book-image">
                            <img src="../asets/book_img/<?php echo $getBook->img; ?>" alt="alt-slika knjige" class="img-thumbnail" id="bookImg">
                        </div>

                        <div class="buy-book my-4">
                            <div class="card bg-light">
                                <div class="card-header test text-light">
                                    <h5 class="m-0">Kupovina:</h5>
                                </div>
                                <div class="card-body">
                                    <div class="book_details ">
                                        <p class="card-text m-0 lead"><b>Format:</b>&nbsp;  <?php echo $getBook->format; ?></p>
                                        <p class="card-text m-0 lead"><b>Broj strana:</b>&nbsp;  <?php echo $getBook->page_number; ?></p>
                                        <p class="card-text m-0 lead"><b>Pismo:</b>&nbsp;  <?php echo $getBook->letter; ?></p>
                                        <p class="card-text m-0 lead"><b>Povez:</b>&nbsp;  <?php echo $getBook->binding; ?></p>
                                        <p class="card-text lead"><b>Godina izdanja:</b>&nbsp;  <?php echo formatDate($getBook->year_of_publish); ?> godine</p>

                                        <h4 class="card-title my-4">Cena: <span class="badge badge-dark p-2" id="price"><?php echo $getBook->price; ?> dinara</span></h4>

                                        <?php if( isset($_SESSION['userId']) ) :?>
                                            <a href="insertIntoShopingCart.php?bookId=<?php echo $getBook->id; ?>" class="btn btn-danger btn-block" id="btn_byBook" data-bookId="<?php echo $getBook->id; ?>" title="Tooltip on top">
                                                <i class="fas fa-cart-arrow-down fa-lg"></i>&nbsp; UBACI U KORPU
                                            </a>
                                        <?php else: ?>
                                            <?php echo "ulogujte se da bi mogli da kupite knjigu";?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </div>    
            
                    <div class="col-8">
                    
                        <div class="header">
                            <h3 class="p-2 test text-light" id="bookName" ><?php echo $getBook->name; ?></h3>
                            
                            <div class="autors">         
                                <div class="d-flex">
                                    <div class="mr-2">
                                        Knjigu napisali: 
                                    </div>
                                    <div>
                                        <?php foreach($getBook->autors as $autor) :?>
                                    
                                                <span class="autor"><?php echo $autor->autor; ?></span><br>
                                            
                                        <?php endforeach?>
                                    </div>
                                </div>
                            </div>
                        

                            <div class="details my-2 py-2">
                                <div class="comments d-flex">
                                    <ul class="fa-ul d-flex m-0 mb-1 mr-3 p-0">
                                        <li><i class="fas fa-star text-danger"></i></li>
                                        <li><i class="fas fa-star text-danger"></i></li>
                                        <li><i class="fas fa-star text-danger"></i></li>
                                        <li><i class="fas fa-star text-danger"></i></li>
                                        <li><i class="fas fa-star text-danger"></i></li>
                                    </ul>
                                    <p class="m-0 p-0">
                                        <span id="commentsCount"><?php echo count($comments); ?></span> Komentara <span class="mx-3">|</span><span >Dodaj svoj komentar</span>
                                    </p>
                                </div>
                                <div class="page-likes">
                                    <p class="m-0">
                                        <span class="badge badge-danger p-2" id="numberOfUserLikes" data-bookId="<?php echo $getBook->id; ?>">
                                            <?php echo $numberOfUsersWhoLikesBook; ?>
                                        </span>&nbsp; 
                                        <span class="lead">Osobe kaže da im se sviđa ova knjiga</span>
                                    </p>
                                </div>

                                <div class="rounded" id="userLikes">
                                                                             
                                </div>

                            </div>     
                        </div>

                        <div id="tabs" class="my-3 bg-transparent">
                            <ul>
                                <li><a href="#tabs-1"><i class="fas fa-atlas"></i>&nbsp; O Knjizi</a></li>
                                <li><a href="#tabs-2"><i class="fas fa-user"></i>&nbsp;  O Autorima</a></li>
                                <li><a href="#tabs-3"><i class="fas fa-comment-dots"></i>&nbsp;  Komentari</a></li>
                            </ul>
                            <div id="tabs-1">
                                <h5><?php echo $getBook->name; ?></h5>

                                <p class="text-justify">
                                    <i><?php echo $getBook->about_book; ?></i>
                                </p>
                            </div>
                            <div id="tabs-2">
                                <?php foreach($getBook->autors as $autor) :?>
                                    <h5><?php echo $autor->autor; ?></h5>

                                    <p class="text-justify">
                                        <i><?php echo $autor->biography; ?></i>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                            <div id="tabs-3">

                                <?php if( count($comments) > 0 ) :?>

                                    <a href="#" id="btn_toggleComments" class="float-right btn btn-primary btn-sm text-light border border-dark"><i class="fas fa-minus-circle"></i> Sakri komentare</a>
                                    
                                    <div id="showComments" class="clearfix mt-5">
                                    
                                        <?php foreach($comments as $comment) :?>

                                            <?php if( $comment->approve === '1' ): ?>
                                            
                                                <div class="media">
                                                    <img src="../asets/user_img/<?php echo $comment->userImage; ?>" class="align-self-start mr-3 comment-user-img rounded img-fluid" alt="korisnikova slika">
                                                    <div class="media-body">
                                                        <h5 class="mt-0"><?php echo $comment->user; ?></h5>
                                                        <p>
                                                            <?php echo $comment->comment; ?>
                                                        </p>

                                                        <?php foreach( $commentReply->getReplies($comment->id) as $reply ):?>
                                                            <div class="media my-3">
                                                                <a class="mr-3" href="#">
                                                                    <img src="../asets/user_img/<?php echo $reply->userImage; ?>" class="mr-3 comment-user-img img-fluid rounded" alt="slika admin korisnika">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h5 class="mt-0"><?php echo $reply->user; ?></h5>
                                                                    <?php echo $reply->reply; ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>           
                                            <?php endif; ?>

                                        <?php endforeach; ?>
                                    
                                    </div>

                                <?php endif; ?>                 
                                <hr>

                                <div class="insertComment">
                     
                                    <?php require '../include/showMessages.php'; ?>

                                    <form action="" method="POST" id="insertComment" id="#commentForm">
                                        <input type="hidden" name="bookId" id="bookId" value="<?php echo $getBook->id; ?>">
                                
                                        <div class="form-group">
                                            <label for="komentar">Unesi komentar:</label>
                                            <textarea name="komentar" id="komentar" cols="30" rows="5" class="form-control" placeholder="Vaš komentar" required></textarea>
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary" type="submit" name="insertComment" required ><i class="fas fa-comment"></i> Unesi komentar</button>
                                        </div>
                                    </form>  

                                </div>
                                
                            </div>
                        </div>
                        
                        <?php if( $logedInUserLikeBook === false && isset($_SESSION['userId']) ): ?>
                            <div class="likes text-center h3" id="btn_like" >
                                <a href="#" id="likeBook" data-bookId ="<?php echo $getBook->id; ?>" class="btn btn-primary btn-block btn-lg"><i class="far fa-thumbs-up"></i>&nbsp; Sviđa mi se</a>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <div class="col-3">

                <div id="download" class="mt-2">
                    <div class="card bg-transparent">
                        <h5 class="card-header test text-light font-weight-normal">Skidanje knjige: </h5>
                        <div class="card-body">
                            <p class="text-center text-danger"><i class="fas fa-file-pdf fa-5x"></i></p>

                            <?php if( isset($_SESSION['userId']) ): ?>
                                <a href="../asets/book_files/<?php echo $getBook->download_link; ?>" class="btn btn-primary btn-block" target="_blank" ><i class="fas fa-file-download fa-lg"></i>&nbsp; Download</a>
                            <?php else: ?>
                                <?php echo "Ulogujte se da bi skinuli knjigu"; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div id="booksFromSameGenre" class="mt-5">
                    <div class="card bg-light">
                        <h5 class="card-header test text-light font-weight-normal">Knjige iz istog žanra: </h5>

                        <div class="card-body">
                            <?php foreach($booksFromSameGanre as $book) :?>

                                <a href="book.php?id=<?php echo $book->id; ?>" class="text-decoration-none text-dark">
                                    <div class="media mb-4 align-items-center">
                                        <img src="../asets/book_img/<?php echo $book->img; ?>" class="mr-3 border border-dark" alt="book image" style="width: 60px; height: 60px;">
                                        <div class="media-body">
                                            <h6 class="mt-0 font-weight-bolder text-dark"><?php echo $book->name; ?></h6>

                                            <?php foreach($book->autors as $autor) :?>
                                            <span class="font-weight-normal font-italic"><?php echo $autor->autor; ?></span><br>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </a>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>

        <?php include '../include/shopingCartModal.php'; ?>
   
    </div>



<?php require '../include/public_footer.php'; ?>

<script>

  // tabovi
  $( function() {
    $( "#tabs" ).tabs();
  });

  // unos komentara
  $( function() {
    
    $("#insertComment").submit(function(e){

        e.preventDefault();

        let komentar = $(this).find("#komentar").val();
        let bookId = $(this).find("#bookId").val();

        url = "<?php echo ROOT; ?>/admin/admin/insertCommentAjax.php";

        let posting = $.post( url, { komentar: komentar,id_knjige: bookId } );
   
        posting.done(function( data ) {

          
            let message = `<div class="alert alert-info border border-light my-3"  id="messages" role="alert">
                                Uneli ste komentar
                           </div>`;
  
           $("#insertComment").prepend(message);

            setTimeout(function(){
                    $("#messages").remove(); 
            }, 3000);

            $("#komentar").val(" ");

           // console.log( $("#commentsCount").text(), data );
           $("#commentsCount").text(`${data}`);
        });

    });

  });

  // uljucivanje i iskljucivanje komentara
  $( function() {
    
    let btn_toggleComments = $("#btn_toggleComments");

    btn_toggleComments.click(function(e) {

        e.preventDefault();

        let test = $(this).text();
      
        if( $.trim(test) == 'Sakri komentare'){
            
            $(this).next().hide();
            $(this).html('<i class="fas fa-plus-circle"></i> Prikazi komentare');

        }else if( $.trim(test) == 'Prikazi komentare' ){

            $(this).next().show();
            $(this).html('<i class="fas fa-minus-circle"></i> Sakri komentare');
        }

    });

  });

  // likeovanje knjige
  $( function() {
    
    let btn_likeBook = $("#likeBook");

    btn_likeBook.click(function(e){

        e.preventDefault();

        let bookId = $(this).attr('data-bookId');

        url = "<?php echo ROOT; ?>/public/likeBookAjax.php";

        $.get( url, { bookId: bookId } )
            .done(function( data ) {
                
                $("#numberOfUserLikes").text(`${data}`);

                $("#btn_like").remove();
            }
        );

    });

  });

  // pogled korisnika kojima se svidja knjiga
  $(function() {

    let fieldCountUserLikes = $("#numberOfUserLikes");
 
    fieldCountUserLikes.mouseenter(function() {

        
        let countUsersWhoLikeThisBook = Number( $.trim($(this).text()) );
        let divUserLikes = $("#userLikes");

        if( countUsersWhoLikeThisBook > 0 ){
            
            let bookId = $(this).attr("data-bookId");

            url = "usersWhoLikeBookAjax.php";

            $.ajax({
                method: "POST",
                url: url,
                data: { bookId: bookId },
                dataType: 'JSON',
            })
            .done(function( data ) {
              
                let users = "";

                $.each(data, function(index, user){
                    users += `<p class="m-0" >${user.name}</p>`;
                });

                let el = $("#userLikes");
                el.html(users);

                el.addClass( 'userLikes' );
                
            });
        }
    });

    fieldCountUserLikes.mouseleave(function(){

        let divUserLikes = $("#userLikes");

        divUserLikes.html(" ");
        divUserLikes.removeClass( "userLikes" );
    })

  });
  
 
  $("#commentForm").validate();


</script>

