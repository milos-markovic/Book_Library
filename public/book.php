<?php
    require '../bootstrap.php';

    
    //$session->setProductsInShopingCart();
    // if(isset( $_SESSION['shopingCart'] )){

    //    $testArray = [];

    //     foreach( $_SESSION['shopingCart'] as $key => $quantity ){

            
    //         $keyArray = explode("_", $key);

    //         $bookId = $keyArray[1]; 


            
    //         $getBook = $book->getBookById( $bookId );
    //         $getBook->quantity = $quantity;

    //        array_push( $testArray,$getBook );            
    //     }

    //     $_SESSION['test'] = $testArray; 
    // }

   


    $getBook = $book->bookDetails($_GET['id']);

    $booksFromSameGanre = $book->getBooksFromeSameGenre( $getBook->genre_id );



    $comments = $comment->getBookCooments( $getBook->id );

    $numberOfUsersWhoLikesBook = $book->countUsersWhoLikesBook( $getBook->id );

    $logedInUserLikeBook = $book->doesLogedInUserLikeBook( $getBook->id );

    $usersWhoLikesBook = $book->getUsersWhoLikeBook( $getBook->id );

    
    $getProductsFromShopingCart = $session->getProductsFromShopingCart();


    require "view/book.view.php";