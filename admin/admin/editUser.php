<?php 
    require '../../bootstrap.php';


    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



    if( isset($_POST['update']) ){
 
        $validate->checkRequireFields( $_POST );
        $validate->checkAddressFields( $_POST['adresa'] );
        $validate->checkEmailField( $_POST['email'] );


        if( empty($validate->errorMessages) ){

            $userId = trim($_POST['userId']);
            

            if( $user->updateUser($_POST, $userId, $_FILES['img']) ){
                
                    $session->setMessage("Uspesno ste izvrsili promenu korisnika");

                    redirect('users');
            }

        }else{
   
            $errors = array_unique($validate->errorMessages);
          
        }  
    }


    $updateUser = $user->getUser($_GET['id']);
   
    $usertypes = $user->getUsertypes();
    $memberships = $user->getMemberships();
      


    include 'view/editUser.view.php';