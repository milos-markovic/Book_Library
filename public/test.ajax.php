<?php
    require '../bootstrap.php';

if( $_POST ){


   $bookId = $_POST['formDates'][0]['value'];
   $quantity = $_POST['formDates'][1]['value'];
   $paymentType = $_POST['formDates'][3]['value'];
   $totalPrice = $_POST['totalPrice'];

   $getBook = $book->bookDetails(  $bookId );
   $getBook->quantity = $quantity;
   $getBook->totalPerBook = $totalPrice;


   $getUser = $user->getUser( $_SESSION['userId'] );

   $session->setInShopingCard( $getUser,$getBook ); 



  //  var_dump( $getBook, $getUser  );
   
}