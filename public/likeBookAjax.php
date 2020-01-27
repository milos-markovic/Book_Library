<?php
    require '../bootstrap.php';


    if( isset($_GET) ){

        $bookId = $_GET['bookId'];

        if( $numberOfUsersWhoLikesBook = $book->likeBook( $bookId) ){

            echo $numberOfUsersWhoLikesBook;
        }

    }

    





    
