<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    $warehouseId = $_GET['id'];
    


    if( $warehouse->deleteWarehouse($warehouseId) ){

        $message = "Skladište je obrisano";

        $session->setMessage($message);

        redirect('bookWarehouses');

    }