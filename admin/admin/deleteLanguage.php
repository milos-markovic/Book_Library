<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if( $language->deleteLanguage($_GET['id']) ){

        $session->setMessage("Uspešno ste obrisali jezik");
        redirect('booklanguages');
    }
    
