<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if( isset($_POST['create']) ){
     
    
      if( !$validate->checkRequireFields( $_POST ) && !$validate->checkIsImageUpload($_FILES['slika']) ){

         if( $news->createNews( $_POST, $_FILES['slika'] )){
         
            $session->setMessage("Uneli ste novu Vest");

            redirect('news');
         }


      }else{
        
         $errors = $validate->errorMessages;
   
      }

   }

   

    include 'view/createNews.view.php';