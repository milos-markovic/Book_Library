<?php
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    
    if( isset($_POST['titleId']) ){

        
        $menuTitle = $menu->getMenuTitle( $_POST['titleId'] );

        echo json_encode( $menuTitle );
    }