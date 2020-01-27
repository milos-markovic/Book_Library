<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    if( isset( $_POST['createTopMenuLink'] )){

        if( $menu->createTopMenuLink($_POST) ){

            $session->setMessage("Napravili ste novi link");

            redirect("menus");
        }

    }
  

   

    include 'view/createTopMenuLink.view.php';