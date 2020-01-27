<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    if(isset($_POST['createLanguage'])){
        
        $validate->checkRequireFields( $_POST );


        if( empty($validate->errorMessages )){
            
            if( $language->createLanguage($_POST) ){

               $session->setMessage("Uspesno ste uneli novi jezik");
               redirect('bookLanguages');
            }

        }else{
            $errors = $validate->errorMessages;
        }
    }
    

    $bookLanguages = $language->getLanguages();



    include 'view/bookLanguages.view.php';