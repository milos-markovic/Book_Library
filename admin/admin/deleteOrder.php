<?php
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    
    $orderId = $_GET['id'];


    if( $order->deleteOrder( $orderId )){

        $session->setMessage("Porudžbina je obrisana");

        header("Location: orders.php");
        exit;
    }