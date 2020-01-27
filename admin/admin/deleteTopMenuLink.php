<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    if( $menu->deleteTopMenuLink( $_GET['id'] )){

        $session->setMessage("Obrisali ste link menija");

        redirect('menus');
    }