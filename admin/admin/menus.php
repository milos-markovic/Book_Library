<?php
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
      header("Location: ../../public/login.php");
    }



    if(  isset( $_POST['updateMenuTitle'] )) {

       if( $menu->updateMenuTitle( $_POST['titleId'],$_POST['menuTitle'] )){

            $session->setMessage("Uspešno ste izvršili promenu meni maslova");

            redirect('menus');

       } 

    }
 

    if( isset($_POST['createSection']) ){

      if( $menu->createMenuTitle( $_POST ) ){

            $session->setMessage("Uspešno ste napravili naslov sekcije menija");

            redirect('menus');
      }

    }




    $bootomMenuItems = $menu->getBootomMenuItems();
    
    $topMenuItems = $menu->getTopMenuItems();



    require 'view/menus.view.php';