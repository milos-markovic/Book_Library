<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if(isset($_POST['createGenre'])){
        
       // $validate->checkRequireFields( $_POST );
        

       if( empty($validate->errorMessages ) ){
            
            if( $genre->createGenre($_POST) ){

               $session->setMessage("uspesno ste uneli novi žanr");
               redirect('bookGenres');
            }

        }else{
            $errors = $validate->errorMessages;
        }
    }
    

    $genres = $genre->getGenres();



    include 'view/bookGenres.view.php';