<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if( $genre->deleteGenre($_GET['id']) ){

        $session->setMessage("Uspešno ste obrisali žanr");
        redirect('bookGenres');
    }
    
