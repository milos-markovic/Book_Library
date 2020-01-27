<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



   if( isset($_POST['create']) ){
      // $validate->checkRequireFields( $_POST );
      // $validate->check_Checkbox_Fields( $_POST );
      // $validate->checkBookName( $_POST['naziv_dela'] );
      // $validate->checkIsImageUpload( $_FILES['slika'] );
      // $validate->checkIsFajlUpload( $_FILES['file'] );
      // var_dump($_POST);
      // exit;

     // var_dump( $_POST );

      if( empty($validate->errorMessages )){

         if( $book->createBook( $_POST, $_FILES['fajl'], $_FILES['slika'] )){
         
            $session->setMessage("Uneli ste novu knjigu");

            redirect('books');
         }

      }else{
         
         $errors = array_unique($validate->errorMessages);
   
      }

   }
    
  

    $number_of_books = (int) $book->getNumberOfBooks();
    $autors = $autor->getAutors();
    $genres = $genre->getGenres();
    $languages = $language->getLanguages();
    $warehouses = $warehouse->getWarehouses();
   

    include 'view/createBook.view.php';