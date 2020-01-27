<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    

    $link = $menu->getMenuLink( $_GET['id'] );
    $titleId = $link->menu_title_id; 

    
    if( $menu->deleteMenuLink( $_GET['id'] ) ){

        $session->setMessage("Uspešno ste obrisali link");

        header("Location: menuLinks.php?titleId=$titleId");
        exit;
    }
    
