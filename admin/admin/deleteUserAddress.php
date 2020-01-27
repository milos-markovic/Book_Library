<?php 
    require '../../bootstrap.php';


    $userId = $_GET['userId'];
    $addressId = $_GET['adressId'];
    $countUserAddresses = $_GET['countAdresses'];


    if( $user->deleteUserAddress($addressId, $countUserAddresses) ){

        $message = "Uspešno ste obrisali adresu korisnika";

        $session->setMessage($message);

        redirect('editUser',$userId);

    }else{
        redirect("editUser",$userId);
    }