<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    

    if( isset($_POST['createMenuLink']) ){

        $titleId = $_POST['titleId'];

        if( $menu->createMenuLink($_POST) ){

            $session->setMessage("Uspešno ste uneli novi link");

            header("Location: menuLinks.php?titleId=$titleId");
            exit;
        }

    }


    $titleId = $_GET['titleId'];
    $menuTitle = $menu->getMenuTitle( $titleId );

    $getMenuLinks = $menu->getMenuLinks( $titleId );


    require 'view/menuLinks.view.php';
    
