<?php 
    require '../../bootstrap.php';


    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



    
    if( isset($_POST['update_link']) ){

        $titleId = $_POST['titleId'];
     
        if( $menu->updateMenuLink( $_POST ) ){

            $session->setMessage("Izmenili ste link menija");

            header("Location:menuLinks.php?titleId=$titleId");

        }
    }


    $link = $menu->getMenuLink( $_GET['id'] );

      


    include 'view/updateMenuLink.view.php';