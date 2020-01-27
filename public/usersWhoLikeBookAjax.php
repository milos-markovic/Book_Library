<?php
    require '../bootstrap.php';


    if( $_POST ){

        $bookId = $_POST['bookId'];

        $users = $book->getUsersWhoLikeBook( $bookId );

        echo json_encode( $users );
    }