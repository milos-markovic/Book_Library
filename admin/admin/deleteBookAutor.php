<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if( $autor->deleteAutor($_GET['id']) ){

        $session->setMessage("Uspešno ste obrisali autora");
        redirect('bookAutors');
    }
    
