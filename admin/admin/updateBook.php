<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if( isset($_POST['update']) ){
     
      // $validate->checkRequireFields( $_POST );
      // $validate->check_Checkbox_Fields( $_POST );
      // $validate->checkBookName( $_POST['naziv_dela'] );
      // $validate->checkBookWarehouses( $_POST['skladiste'] );


      if( empty($validate->errorMessages) ){

         $bookId = trim($_POST['bookId']);

         if( $book->UpdateBook( $_POST, $_FILES['fajl'], $_FILES['slika'], $bookId )){

            $session->setMessage("Uspešno ste izvršili promenu knjige");

            redirect('books');
         }

      }else{
         
         $errors = $validate->errorMessages;
   
      }

   }
    

    $getBook = $book->bookDetails($_GET['id']);
   //  var_dump( $getBook );
   //  exit;
   
    
  

 

    $autors = $autor->getAutors();
    $genres = $genre->getGenres();
    $languages = $language->getLanguages();
    $warehouses = $warehouse->getWarehouses();



    include 'view/updateBook.view.php';