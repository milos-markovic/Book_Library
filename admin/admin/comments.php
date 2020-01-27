<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

   
    

    $users = $comment->getAllComments();


    
    include 'view/comments.view.php';