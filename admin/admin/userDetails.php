<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


     $userDetails = $user->getUser($_GET['id']);



    include 'view/userDetails.view.php';