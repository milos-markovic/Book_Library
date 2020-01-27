<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    
    $commentId = $_GET['commentId'];

    if( $commentReply->deleteCommentReply($_GET['id']) ){

        $session->setMessage("Uspešno ste obrisali odgovor na komentar");
        header("Location: commentReplies.php?id=$commentId");

    }
    
