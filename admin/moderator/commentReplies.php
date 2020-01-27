<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    

    if( isset($_POST['reply']) ){

        $commentId = $_POST['commentId'];

        if( $commentReply->insertReply($_POST) ){

            $session->setMessage("Uneli ste odgovor na komentar");
            header("Location: commentReplies.php?id=$commentId");
        }
    }

   
    $getComment = $comment->getComment($_GET['id']);

    $getCommentReplies = $commentReply->getReplies( $getComment->id );

  
    
    include 'view/commentReplies.view.php';