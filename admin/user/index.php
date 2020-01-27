<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   $orders = $order->getRegularUserOrders( $_SESSION['userId'] );




    include 'view/index.view.php';
        