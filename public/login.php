
<?php 
    require '../bootstrap.php';


    if(isset($_POST['login'])){

            
            $validate->checkRequireFields($_POST);
            $validate->checkEmailField($_POST['email']);

            if( empty( $validate->errorMessages )){

                if($session->login($_POST)){
            
                    $usertype = $user->getUsertype();
                    
                    if($usertype === 'admin'){
    
                        header("Location: ../admin/admin");
    
                    }elseif($usertype === 'moderator'){
    
                        header("Location: ../admin/moderator");
    
                    }else{

                        header("Location: ../admin/user");
                    }
                }

            }else{

                $errors = $validate->$errorMessages;
            }

            

            

    }




    require 'view/login.view.php';




