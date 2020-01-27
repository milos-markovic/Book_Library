
<?php include '../../include/header.php';?>


<div class="container py-5">

<h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>

<?php include '../../include/showMessages.php'; ?>

<h1 class="display-4 mb-4 text-center">Komentari</h1><hr>


<div class="row">

    <div class="col-10 mx-auto">
    
        <div class="card my-5">
            <table class="table table-hover m-0" >
                <thead>
                    <tr>
                        <th>Korisnik</th>
                        <th>Napisao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>

                        <?php if( count($user->comments) ): ?>
                            
                            <tr>
                            
                                <td><p><?php echo $user->name; ?></p></td>
                                <td>
                                    <?php foreach($user->comments as $comment) :?>
                                        
                                        <div class="d-flex mb-4 align-items-center justify-content-between">
                                            
                                            <blockquote class="blockquote">
                                                <p class="mb-0"><?php echo $comment->comment; ?></p>
                                                <footer class="blockquote-footer">Komentar na knjigu:&nbsp; <cite title="Source Title"><?php echo $comment->knjiga; ?></cite></footer>
                                            </blockquote>

                                            <div class="align-items-center">

                                                <a href="commentReplies.php?id=<?php echo $comment->id; ?>" class="mr-3" >Odgovori</a>
                                                <a href="approveComment.php?id=<?php echo $comment->id; ?>" class="btn btn-warning btn-sm mr-2" id="odobri" >
                                                    <?php if($comment->approve === '1'): ?>

                                                        <?php echo 'Zabrani'; ?>

                                                    <?php else: ?>

                                                        <?php echo 'Odobri'; ?>

                                                    <?php endif; ?>
                                                </a>
                                                <a href="deleteComment.php?id=<?php echo $comment->id; ?>" class="btn btn-danger btn-sm" >Obriši</a>

                                            </div>
                                        </div>
                                     
                                    <?php endforeach; ?>
                                </td>

                            </tr>
                            
                        <?php endif; ?>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>



   



<?php include '../../include/footer.php';?>



