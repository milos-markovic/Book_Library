<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if( isset($_POST['update']) ){


      $validate->checkRequireFields( $_POST );
      
      
      if( empty($validate->errorMessages) ){

         if( $warehouse->UpdateWarehouse( $_POST)){
         
            $session->setMessage("Uspešno ste izvršili promenu skladišta");

            redirect('bookWarehouses');
         }


      }else{
         
        
         $errors = $validate->errorMessages;
  
      }
   }



    $warehouseKey = $_GET['warehouseKey'];
    $warehouseId = $_GET['warehouseId'];


    
    $getWarehouse = $warehouse->getWarehouse($warehouseId, $warehouseKey);
 
  

    include 'view/updateWarehouse.view.php';