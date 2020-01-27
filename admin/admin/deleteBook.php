<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if( $book->deleteBook($_GET['id']) ){

        $session->setMessage("Uspešno ste obrisali Knjigu");
        redirect('books');
    }
    
