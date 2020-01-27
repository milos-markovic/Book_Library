<?php
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    $orders = $order->getOrders();



    require 'view/orders.view.php';