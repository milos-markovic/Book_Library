<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    

    if( $comment->approveComment($_GET['id']) ){

        $session->setMessage("Status komentara je izmenjen");

        redirect('comments');
    }



    include 'view/bookAutors.view.php';