<?php
    require '../bootstrap.php';

    // if(isset( $_SESSION['shopingCart'] )){

    //     $testArray = [];
 
    //      foreach( $_SESSION['shopingCart'] as $key => $quantity ){
 
             
    //          $keyArray = explode("_", $key);
 
    //          $bookId = $keyArray[1]; 
 
 
             
    //          $getBook = $book->getBookById( $bookId );
    //          $getBook->quantity = $quantity;
 
    //         array_push( $testArray,$getBook );            
    //     }
 
    //      $_SESSION['test'] = $testArray; 
    // }

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }



    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;
    

    $books = $book->getBooks();
    $totalBooks = count( $books );

    $total_pages = ceil( $totalBooks / $no_of_records_per_page );
    
    $getBooksPerPage = $book->getBooksPerPage( $offset, $no_of_records_per_page );



    // podaci za korpu
    $getProductsFromShopingCart = $session->getProductsFromShopingCart();

    // zanrovi knjiga
    $genres = $genre->getGenres();

    
    require "view/books.view.php";