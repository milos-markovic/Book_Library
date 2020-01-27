<?php
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    $getUser = $user->getUser( $_SESSION['userId'] );
    


    require 'view/editUserProfile.view.php';