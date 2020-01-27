<?php
    require '../bootstrap.php';


    if( $session->logout() ){
        header("location: login.php");
        exit;
    }