<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



    
    $users = $user->getUsers();



    include 'view/users.view.php';