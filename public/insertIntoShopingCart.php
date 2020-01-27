<?php
    require '../bootstrap.php';




   
    $bookId = $_GET['bookId'];

    $session->addProductToShopingCart( $bookId );
   // $_SESSION['shopingCart']['product_'.$bookId ] += 1;

    header("Location: book.php?id=$bookId");
    

    


