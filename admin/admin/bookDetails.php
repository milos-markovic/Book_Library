<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

   
    

    $bookDetails = $book->bookDetails($_GET['id']);

 



    include 'view/bookDetails.view.php';