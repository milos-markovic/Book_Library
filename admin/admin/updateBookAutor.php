<?php 
    require '../../bootstrap.php';


    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }



    if( isset($_POST['update']) ){

        $validate->checkRequireFields( $_POST,'titula' ); 
               
       
        if( empty($validate->errorMessages) ) {
 
           $autorId = trim($_POST['autorId']);

           if( $autor->updateAutor($_POST, $autorId, $_FILES['slika']) ){
            
                $session->setMessage("Uspesno ste izmenili autora");

                redirect('bookAutors');
           }

        }else{
   
            $errors = $validate->errorMessages;
        }
    }

    
    $bookAutor = $autor->getAutor($_GET['id']);

      


    include 'view/updateBookAutor.view.php';