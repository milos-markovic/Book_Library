<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



    if(isset($_POST['create'])){
       
        $validate->checkRequireFields( $_POST );


        if( empty($validate->errorMessages) ){

            if( $warehouse->createWorehouse($_POST)){

                $session->setMessage("Napravili ste novo skladište");
                redirect('bookWarehouses');
            }

        }else{

       
          $errors = $validate->errorMessages;
        }
    }

   

    include 'view/createWarehouse.view.php';