<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    

    if(isset( $_POST )){

        if( $countBookComments = $comment->insertComment( $_POST ) ){

            echo $countBookComments;
        }
    }

