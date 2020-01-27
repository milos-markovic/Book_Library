<?php 
    require '../bootstrap.php';


        if(isset( $_POST['register'] )){

            
            $validate->checkRequireFields( $_POST );
            $validate->checkEmailField( $_POST['email'] );
            $validate->confirmPassword( $_POST );


            if( empty($validate->errorMessages )){

                $user = $session->findUser( $_POST['email'], $_POST['lozinka'] );

                if( empty($user) ){

                    if( $session->register( $_POST ) ){

                        $session->setMessage("Uspešno ste se registrovali, molimo vas ulogujte se");

                        redirect( 'login' );
                    }

                }else{
                    $validate->errorMessages[] = "već postoji korisnik sa ovakvim imejlom i lozinkom, molimo vas unesite druge vrednosti";
                }

            }else{

                $errors = $validate->errorMessages;
            }
        }




    require 'view/register.view.php';



