<?php
 require '../../bootstrap.php';

 if( !$session->isLogedIn() ){
    header("Location: ../../public/login.php");
 }


 
if( isset($_POST) ){

    $serachResult =  $book->serachBookByName( $_POST['bookName'] );


    require 'view/searchBook.view.php';
}