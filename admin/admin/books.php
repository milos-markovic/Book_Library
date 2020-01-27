<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

   
    

    $books = $book->getBooks();
 


    include 'view/books.view.php';