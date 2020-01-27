
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>

    <?php include '../../Include/showMessages.php';?>


    <blockquote class="blockquote text-right">
        <p class="mb-0">Komentar:&nbsp; <?php echo $getComment->comment; ?></p>
        <footer class="blockquote-footer"><cite title="Source Title"><?php echo $getComment->user; ?></cite></footer>
    </blockquote>


    <?php if( count($getCommentReplies) ) :?>
        <h2 class="ml-5 pl-5 mb-4">Odgovori:</h2>

        <div class="row">
            <div class="col-10 font-weight-bold">
            
                <?php foreach($getCommentReplies as $reply) :?>

                
                        <blockquote class="blockquote">
                            <div class="d-flex">
                                <div>
                                    <p class="mb-0">Odgovor:&nbsp; <?php echo $reply->reply; ?></p>
                                    <footer class="blockquote-footer mr-5"><cite title="Source Title"><?php echo $reply->user; ?></cite></footer>
                                </div>
                                <div>
                                    <a href="deleteCommentReply.php?id=<?php echo $reply->id; ?>&commentId=<?php echo $getComment->id; ?>" class="btn btn-danger ml-5">Obriši Odgovor</a>
                                </div>
                            </div>
                        </blockquote>
                        <hr>
                    
                <?php endforeach; ?>
            
            </div>
        
        </div>
    <?php else: ?>

        <h3 class="mb-5">Unesite odgovor na komentar</h3>

    <?php endif; ?>

    <a href="" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" >Unesi Odgovor</a>
    

    <!-- modal za unos odgovora -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Unesite odgovor na sledeći komentar:<br>
                        <blockquote class="blockquote text-center">
                            <p class="mb-0 text-primary"><?php echo $getComment->comment; ?></p>
                            <footer class="blockquote-footer"><cite title="Source Title"><?php echo $getComment->user; ?></cite></footer>
                        </blockquote>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                

                <form action="" method="POST">
                    <input type="hidden" name="commentId" value="<?php echo $getComment->id; ?>" >
                    <div class="modal-body">

                    
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Odgovor:</label>
                            <textarea class="form-control" id="message-text" name="replyText" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                        <button type="submit" name="reply"  class="btn btn-primary">Pošalji odgovor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>


<?php include '../../include/footer.php';?>



        

        