<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    
    if( $user->deleteUser($_GET['id']) ){

        $message = "Uspešno ste obrisali korisnika";
        
        $session->setMessage($message);

        redirect('users');
    }