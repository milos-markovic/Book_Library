<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    
    if( $comment->deleteComment($_GET['id']) ){

        $session->setMessage("Uspešno ste obrisali komentar");
        redirect('comments');
    }
    
