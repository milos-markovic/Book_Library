<?php 
    require '../../bootstrap.php';

    // if( !$session->isLogedIn() ){
    //     header("Location: ../../public/login.php");
    // }

   
    

    $bookAutors = $autor->getAutors();



    include 'view/bookAutors.view.php';