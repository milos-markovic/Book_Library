<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if( isset($_POST['reply']) ){

        $commentId = $_POST['commentId'];

        if( empty($validate->errorMessages )){

            if( $commentReply->insertReply($_POST) ){
    
                $session->setMessage("Uneli ste odgovor na komentar");
                header("Location: commentReplies.php?id=$commentId");
            }

        }else{

            $errors = $validate->errorMessages();
        }

    }

   
    $getComment = $comment->getComment($_GET['id']);

    $getCommentReplies = $commentReply->getReplies( $getComment->id );

  
    
    include 'view/commentReplies.view.php';