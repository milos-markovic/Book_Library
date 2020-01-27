<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if(isset( $_POST )){

      if($warehouse->UpdateNumbeOfCopiesInMiddleTable( $_POST['numCopies'], $_POST['bookId'], $_POST['arrayKeyNumberOfCopies'] )){
         echo "Izvršena je promena broja kopija knjige";
      }else{
         echo "nastala je greska prilikom pokusaja promene";
      }

   }

