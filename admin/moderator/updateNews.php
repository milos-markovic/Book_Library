<?php 
    require '../../bootstrap.php';

    
    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if( isset($_POST['update']) ){

      $newsId = trim($_POST['newsId']);


      if( !$validate->checkRequireFields($_POST) ){

         if( $news->UpdateNews( $_POST, $_FILES['slika'], $newsId )){
         
            $session->setMessage("Uspešno ste izvršili promenu Članka");

            redirect('news');
         }


      }else{
         
        
         $errors = $validate->errorMessages;
         //echo "ovde je erors";
  
      }
   }
    

    $getNews = $news->getNews($_GET['id']);
   

    include 'view/updateNews.view.php';