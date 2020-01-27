<?php
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    

    if( isset($_POST['updateTopMenuLink']) ){

        if( $menu->updateTopMenuLink( $_POST ) ){

            $session->setMessage("Uspesno ste izvršili promenu linka");

            redirect("menus");
        }

    }

    $menuItem = $menu->getTopMenuItem( $_GET['id'] );


    require 'view/updateTopMenuLink.view.php';