<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if( $menu->deleteMenuTitle( $_GET['id'] ) ){

        $session->setMessage("Uspešno ste obrisali sekciju menija");

        header("Location: menus.php");
        exit;
    }
    
