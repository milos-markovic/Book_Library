<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }
    
    
    $getWarehouses = $warehouse->getWarehouses();
  
    



    include 'view/bookWarehouses.view.php';