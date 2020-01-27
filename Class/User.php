<?php

    class User {

        private $query;

        public function __construct($query){
            $this->query = $query;
        }

        public function getUsertype(){

            $sql = "SELECT usertype.name as usertype FROM users JOIN usertype ON usertype.id = users.usertype_id WHERE users.id = :userId";
            $array = [
                ':userId' => $_SESSION['userId']
            ];

            $user = $this->query->returnRows($sql, $array, true);
            return $user ? $user->usertype : [];

        }

        public function getUsers(){
            
            $sql = "SELECT u.id,u.username,u.first_name,u.last_name,u.email,u.password,u.phone,u.img,u.date_of_birth,u.created_at,u.updated_at,usertype.name as usertype
                     FROM users AS u JOIN usertype ON usertype.id = u.usertype_id";
            $users = $this->query->returnRows($sql);
            return $users ? $users : [];
        }

        public function getUser($userId){

            $sql = "SELECT u.id,u.username,u.first_name,u.last_name,u.email,u.password,u.phone,u.img,u.date_of_birth,u.created_at,u.updated_at,usertype.name as usertype,m.name as membership
                     FROM users AS u 
                     JOIN usertype ON usertype.id = u.usertype_id
                     JOIN membership AS m ON m.id = u.membership_id WHERE u.id = :userId";
            $array = [
                ':userId' => $userId
            ];
 
            $user = $this->query->returnRows($sql, $array, true);
            $user->addresses = $this->getUserAdresses( $userId );
            return $user ? $user : [];
        } 

        private function getUserAdresses($userId){

         
            $sql = "SELECT a.id,a.country,a.city,a.street FROM addresses AS a WHERE user_id = :user_id";
            $array = [
                ':user_id' => $userId
            ];
            $adresses = $this->query->returnRows($sql, $array);
            return $adresses ? $adresses : [];
        }

        public function getUsertypes(){

            $sql = "SELECT * FROM usertype";
            $usertypes = $this->query->returnRows($sql);
            return $usertypes ? $usertypes : []; 
        }

        public function getMemberships(){

            $sql = "SELECT * FROM membership";
            $memberships = $this->query->returnRows($sql);
            return $memberships ? $memberships : []; 
        }

        public function updateUser($inputArray, $userId, $uploadFile){

    
            $array = [
                ':username' => trim($inputArray['korisničko_ime']),
                ':first_name' => trim(ucfirst($inputArray['ime'])),
                ':last_name' => trim(ucfirst($inputArray['prezime'])),
                ':email' => trim($inputArray['email']),
                ':password' => password_hash( trim($inputArray['lozinka']), PASSWORD_BCRYPT ),
                ':phone' => trim($inputArray['telefon']),
                ':date_of_birth' => trim(date("Y-m-d",strtotime($inputArray['datum_rođenja']))),
                ':updated_at' => date("Y-m-d H:i:s"),
                ':usertype_id' => trim($inputArray['tip_korisnika']),
                ':membership_id' => trim($inputArray['članarina']),
                ':userId' => trim($userId)
            ];
        
            if( !empty($uploadFile['name']) ){

                $this->deleteUserImage($userId);

                if( $this->uploadImage($uploadFile)){

                    $sql = "UPDATE users SET username = :username,first_name = :first_name,last_name = :last_name,email = :email,password = :password,";
                    $sql .= "phone = :phone,img = :img,date_of_birth = :date_of_birth,updated_at = :updated_at,usertype_id = :usertype_id,";
                    $sql .= "membership_id = :membership_id WHERE id = :userId";

                    $array[':img'] = trim(basename($uploadFile['name']));
                    $isUpdateUser = $this->query->runQuery($sql, $array);
                    if($isUpdateUser ){
                        return $this->updateUserAdresses($inputArray['adresa'], $userId);
                    }else{
                        throw new Exception('Error create user');
                    }
                }
            
            }else{
                $sql = "UPDATE users SET username = :username,first_name = :first_name,last_name = :last_name,email = :email,password = :password,";
                $sql .= "phone = :phone,date_of_birth = :date_of_birth,updated_at = :updated_at,usertype_id = :usertype_id,";
                $sql .= "membership_id = :membership_id WHERE id = :userId";
                $isUpdateUser = $this->query->runQuery($sql, $array);
                if($isUpdateUser){
                    return $this->updateUserAdresses($inputArray['adresa'], $userId);
                }else{
                    throw new Exception('Error create user');
                }
            }
            
           
        }

        public function createUserAddresses($userId, $addresses){

            $counter = 0;

            if(is_array($addresses)){
                
                foreach($addresses as $address){
                    $sql = "INSERT INTO addresses(country,city,street,user_id)VALUES(:country,:city,:street,:userId)";
                    $array = [
                        ':country' => trim($address['drzava']),
                        ':city' => trim($address['grad']),
                        ':street' => trim($address['ulica']),
                        ':userId' => trim($userId)
                    ];
                    $insertAddress = $this->query->runQuery($sql, $array);
                    if($insertAddress){
                        $counter++;
                    }
                }
                return ($counter > 0) ? true : false;  
            }
        }

        private function updateUserAdresses($addresses, $userId){

            $sql = "DELETE FROM addresses WHERE user_id = :userId";
            $array = [
                ':userId' => $userId
            ];
            $deleteUserAdressess = $this->query->runQuery($sql, $array);

            if($deleteUserAdressess){

                return $this->createUserAddresses($userId, $addresses);

            }else{
                echo "Nije uspelo brisanje adresa";
            }
        }

        public function deleteUserAddress($addressId, $number_of_user_addresses){

            if($number_of_user_addresses > 1){
                $sql = "DELETE FROM addresses WHERE id = :addressId";
                $array = [
                    ':addressId' => $addressId
                ];
                $deleteAddress = $this->query->runQuery($sql, $array);
                return $deleteAddress ? true : false;
            }else{
                return false;
            }
        }

        public function createUser($inputArray, $uploadFile){

           // var_dump($inputArray);;exit;

            $array = [
                ':username' => trim($inputArray['korisničko_ime']),
                ':first_name' => trim(ucfirst($inputArray['ime'])),
                ':last_name' => trim(ucfirst($inputArray['prezime'])),
                ':email' => trim($inputArray['email']),
                ':password' => trim(md5($inputArray['lozinka'])),
                ':phone' => trim($inputArray['telefon']),
                ':date_of_birth' => trim(date("Y-m-d",strtotime($inputArray['datum_rođenja']))),
                ':created_at' => date("Y-m-d H:i:s"),
                ':updated_at' => '',
                ':usertype_id' => trim($inputArray['tip_korisnika']),
                ':membership_id' => trim($inputArray['članarina']),
            ]; 

           if( !empty($uploadFile['name']) ){

                if( $this->uploadImage($uploadFile) ){

                    $sql = "INSERT INTO users(username,first_name,last_name,email,password,phone,img,date_of_birth,created_at,updated_at,usertype_id,membership_id)";
                    $sql .="VALUES(:username,:first_name,:last_name,:email,:password,:phone,:img,:date_of_birth,:created_at,:updated_at,:usertype_id,:membership_id)";
                    $array[':img'] = trim(basename($uploadFile['name']));
                }

           }else{
                $sql = "INSERT INTO users(username,first_name,last_name,email,password,phone,date_of_birth,created_at,updated_at,usertype_id,membership_id)";
                $sql .="VALUES(:username,:first_name,:last_name,:email,:password,:phone,:date_of_birth,:created_at,:updated_at,:usertype_id,:membership_id)";
                
           }

            $createUser = $this->query->runQuery($sql, $array);
            if($createUser){
                $insertId = $this->query->lastInsertId();
                $createAdresses = $this->createUserAddresses($insertId, $inputArray['adresa']);
                return $createAdresses ? true : false;
            }           
        }
        
        public function uploadImage($uploadFile){

            $image_name = trim(basename($uploadFile['name']));
            $tmp_name = trim($uploadFile['tmp_name']);

            $file_path = "../../asets/user_img";

            return move_uploaded_file($tmp_name, $file_path.'/'.$image_name );
        }

        public function deleteUser($userId){

            // brise sliku iz foldera
            $this->deleteUserImage($userId);

            $sql = "DELETE FROM users WHERE id = :userId";
            $array = [
                ':userId' => $userId
            ];
            $deleteUser = $this->query->runQuery($sql, $array);
            return $deleteUser ? true : false;  
        }

        public function deleteUserImage($userId){

            $user = $this->getUser($userId);

            if(!empty($user->img)){
                if(file_exists( "../../asets/user_img/$user->img" )){
                    unlink('../../asets/user_img/'.$user->img);
                    return;
                }
            }else{
                return;
            }  
        }
    
































    }