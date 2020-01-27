<?php
    require '../bootstrap.php';

    if(isset( $_POST['byProduct'] )){

        $getUser = $user->getUser($_SESSION['userId']);

        if( $order->insertOrder( $_POST, $getUser->id )){

            $_SESSION['shopingCart'] = [];
            unset( $_SESSION['shopingCart'] );

            $_SESSION['shopingCartProducts'] = [];
            unset( $_SESSION['shopingCartProducts'] );


            $session->setMessage("Vaša porudžbina je prosleđena, naši kuriri će vam dostaviti naručene proizvode u naredna dva dana");

            redirect('books');
        }

    
    }