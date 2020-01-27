<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if( isset($_POST['create']) ){
     
      $validate->checkRequireFields( $_POST,'titula' );
      $validate->checkIsImageUpload( $_FILES['slika'] );
     

      if( empty($validate->errorMessages) ) {

         if( $autor->createAutor($_POST, $_FILES['slika']) ){
         
            $session->setMessage("Napravili ste novog autora");

            redirect('bookAutors');
         }

      }else{
         
         $errors = array_unique($validate->errorMessages); 
   
      }
   }



    include 'view/createBookAutor.view.php';

    