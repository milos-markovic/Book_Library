<?php
    require '../bootstrap.php';



    $productId = $_GET['id'];
    $bookId = $_GET['bookId'];


   


    foreach( $_SESSION['shopingCart'] as $key => $sessionElement ){

        $pieces = explode('_', $key );

        $id_from_pieces = $pieces[1];
        
        if( $id_from_pieces === $productId ){

            unset( $_SESSION['shopingCart'][$key] );

            header("Location: books.php");
            exit;
        }
    }





    