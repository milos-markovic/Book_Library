<?php
    session_start();

    class Session {

        private $query;


        public function __construct($query){

            $this->query = $query;

        }

        public function login($inputFields){

            $email =  trim($inputFields['email']);
            $password = trim($inputFields['password']);

            $user = $this->findUser($email, $password);

            if(!empty($user)){

                return $this->setSession($user);
             
            }else{
                throw new Exception("User with that email and password doesn't exists");
            }

        }

        public function register( $inputArray ){

          $sql = "INSERT INTO users(username,first_name,last_name,email,password,phone,img,date_of_birth,usertype_id,membership_id)";
          $sql .= "VALUES(:username,:first_name,:last_name,:email,:password,:phone,:img,:date_of_birth,:usertype_id,:membership_id)";
          $array = [
              ':username' => trim( $inputArray['korisničko_ime'] ),
              ':first_name' => '',
              ':last_name' => '',
              ':email' => $inputArray['email'],
              ':password' => password_hash( trim($inputArray['lozinka']), PASSWORD_DEFAULT ),
              ':phone' => '',
              ':img' => '',
              ':date_of_birth' => '',
              ':usertype_id' => 2,
              ':membership_id' => 1
          ];
          $registerUser = $this->query->runQuery( $sql,$array );
          return $registerUser ? true : false;
            
        }

        public function findUser($email, $password){

            $sql = "SELECT * FROM users WHERE email = :email";
            $array = [
                ':email' => $email
            ];
            $user = $this->query->returnRows($sql, $array, true);
            if( $user ){
                if( password_verify($password, $user->password )){
                    return $user;
                }else{
                    $this->setMessage("Lozinke se ne slažu");
                }
            }
        }

        private function setSession($user){

            if(is_object($user)){

                $_SESSION['userId'] = $user->id;
                $_SESSION['name'] = $user->first_name.' '.$user->last_name;

                $_SESSION['isSetSession'] = true;

                return true;
            }else{
                return false;
            }

        }

        public function isLogedIn(){
            if(isset($_SESSION['isSetSession'])){
                return true;
            }
            return false;
        }

        public function logout(){
            if(isset($_SESSION['userId'])){
                $_SESSION = [];

               return session_destroy();
            }
        }

        public function setErrorMessages($messages){
            
            if(!empty($messages)){

                $messages = array_unique($messages);

                $_SESSION['errorMessages'] = $messages;
            }
        }

        public function getErrorMessages(){

            if(isset($_SESSION['errorMessages'])){
                return $_SESSION['errorMessages'];
            }
        }


        public function destroyErrorMessages(){

            if(isset($_SESSION['errorMessages'])){
                unset($_SESSION['errorMessages']);
            }
        }

        public function setMessage($message){
            
            if(!empty($message)){

                $_SESSION['message'] = $message;
            }
        }

        public function getMessage(){

            if(isset($_SESSION['message'])){
                return $_SESSION['message'];
            }
        }

        public function destroyMessage(){
            if(isset($_SESSION['message'])){
                unset($_SESSION['message']);
            }
        }

        // ubacivanje proizvoda u korpu
        public function addProductToShopingCart( $bookId ){

            $_SESSION['shopingCart']['product_'.$bookId ] += 1;

        }

        // kreiranje korpe sa proizvodima
        public function getProductsFromShopingCart(){
            global $book;

            if( isset( $_SESSION['shopingCart'] )){

                $testArray = [];
         
                 foreach( $_SESSION['shopingCart'] as $key => $quantity ){
         
                     
                     $keyArray = explode("_", $key);
         
                     $bookId = $keyArray[1]; 
         
         
                     
                     $getBook = $book->getBookById( $bookId );
                     $getBook->quantity = $quantity;
         
                    array_push( $testArray,$getBook );            
                 }
         
                 $_SESSION['shopingCartProducts'] = $testArray;

                 return $_SESSION['shopingCartProducts'];
             }
        }

    }
