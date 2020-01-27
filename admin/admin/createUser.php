<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if( isset($_POST['create']) ){
     
      $validate->checkRequireFields( $_POST );
      $validate->checkAddressFields( $_POST['adresa'] );
      $validate->checkEmailField( $_POST['email'] );
      

   
      if( empty($validate->errorMessages )){

         if( $user->createUser($_POST, $_FILES['img']) ){
         
            $session->setMessage("Napravili ste novog korisnika");

            redirect('users');
         }

      }else{
         
         $errors = array_unique($validate->errorMessages); 
        
      }
   }



     $usertypes = $user->getUsertypes();
     $memberships = $user->getMemberships();
   

    include 'view/createUser.view.php';