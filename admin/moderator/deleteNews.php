<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    
    if( $news->deleteNews( $_GET['id']) ){

        $message = "Uspešno ste obrisali članak";
        
        $session->setMessage($message);

        redirect('news');
    }