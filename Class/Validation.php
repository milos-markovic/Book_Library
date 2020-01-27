<?php
    class Validation {
        
        // nema gresaka
        //private $hasErrors = false;

        public $errorMessages = [];
        private $query;

        public function __construct($query){
            $this->query = $query;
        }


        public function isValidateRegistration($inputArray){

            $this->checkRequireFields( $inputArray );
            $this->confirmPassword( $inputArray );
            $this->checkEmailField($inputArray['email']);

            if( !empty( $this->errorMessages ) ){

                return false;
            }
            return true;
        }

        public function isValidateLogin($inputArray){

            $this->checkRequireFields( $inputArray );
            $this->checkEmailField($inputArray['email']);

            if($this->hasErrors){

                return false;
            }
            return true;
        }

        public function checkRequireFields( $inputFields, $fieldDontCheck = null ){
            
            foreach( $inputFields as $key => $inputField ){

                if( $fieldDontCheck !== null && $fieldDontCheck === $key ){
                    continue;
                }else{
                    if( !isset( $inputFields[$key] ) || $inputFields[$key]  === ''){
                        array_push( $this->errorMessages, "Polje $key je obavezno polje" );
                    }
                }  
            }
        }

        public function confirmPassword($inputArray){

            $password = trim($inputArray['lozinka']);
            $confirm_password = trim($inputArray['potvrda_lozinke']);

            if( $password !== $confirm_password ){
                array_push( $this->errorMessages, "Ne podudaraju vam se lozinke, unesite ponovo vrednosti u ova polja" );
            }

        }

        public function checkEmailField($email){

            if($email !== ''){
                
                if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                
                    array_push($this->errorMessages, "Polje email je nepravilnog formata");
                }
            }
        }

        public function checkUserAdresses($inputArray){
        
            foreach($inputArray['adresa'] as $address){

                if(empty($address['ulica']) || empty($address['grad']) || empty($address['drzava'])){

                    $this->hasErrors = true;
                    array_push( $this->errorMessages, "Sva polja vezana za adresu su obavezna polja" );
                }
            }

            return $this->hasErrors;
        }

        public function checkIsImageUpload($file){

            $file_type = trim($file['type']);
            $file_error = trim($file['error']);

            
            if($file_error === '0'){
                
                if( $file_type !== "image/jpeg" && $file_type !== "image/jpg" && $file_type !== "image/png"){
                    array_push( $this->errorMessages, "Moguce je jedino sliku uplovdovati" );
                }    
            }else{
                array_push( $this->errorMessages, "Izaberite sliku za upload" );
            }
        }

        public function checkIsFajlUpload($file){

            $file_type = trim($file['type']);
            $file_error = trim($file['error']);

            
            if($file_error === '0'){
                
                if( $file_type !== "application/pdf" && $file_type !== "txt" ){
                    array_push( $this->errorMessages, "Moguće je samo uplovdovati pdf i txt fajlove" );
                    $this->hasErrors = true;
                }    
            }else{
                array_push( $this->errorMessages, "Izaberite fajl za upload" );
                $this->hasErrors = true;
            }
            return $this->hasErrors;
        }

        // public function isValidUser($inputArray, $file){

        //     $checkRequireFields =  $this->checkRequireFields($inputArray);   
        //     $checkUserAddresses = $this->checkUserAdresses($inputArray);
        //     $ckeckEmailField  = $this->checkEmailField($inputArray['email']); 

        //     if( $checkRequireFields || $checkUserAddresses || $ckeckEmailField ){
        //         // ako ima gresaku
        //         return false;
        //     }else{
        //         // ako nema true je
        //         return true;
        //     }
        // }

        public function isValidBook($inputArray, $file, $img){

            $checkRequireFields =  $this->checkRequireFields($inputArray);
            $check_CheckBox_fields = $this->check_Checkbox_Fields($inputArray);
            $checkUploadFile  = $this->checkIsFajlUpload($file);
            $checkUploadImage = $this->checkIsImageUpload($img);
            $checkBookName = $this->checkBookName($inputArray['naziv_dela']);
          //  $checkBookWarehouses = $this->checkInsertCopies( $inputArray['broj_kopija'] );  
            
            if( $checkRequireFields || $check_CheckBox_fields || $checkUploadFile || $checkUploadImage || $checkBookName ){
                return false;
            }else{
                return true;
            }

        }

        public function isValidUpdateBook($inputArray, $file, $img){

            $checkRequireFields =  $this->checkRequireFields($inputArray);
            $check_CheckBox_fields = $this->check_Checkbox_Fields($inputArray);
            
            if( $checkRequireFields || $check_CheckBox_fields ){
                return false;
            }else{
                return true;
            }
        }

        public function check_Checkbox_Fields( $inputFields ){
            
            if( empty($inputFields['autor']) ){
                array_push( $this->errorMessages, "Morate izabrati autora" );
            }

            if( empty($inputFields['language']) ){
                array_push( $this->errorMessages, "Morate izabrati jezik" );
            }

            if( empty($inputFields['warehouse']) ){
                array_push( $this->errorMessages, "Morate izabrati skladište" );
            }
           
 
        }

        public function checkBookName( $bookName ){

            $sql = "SELECT * FROM books WHERE name = :bookName";
            $array = [
                ':bookName' => $bookName
            ];
            $findBook = $this->query->returnRows( $sql,$array,true );
            if(is_object( $findBook )){   
                array_push( $this->errorMessages, "Takav naziv dela već postoji, Molimo Vas unesite drugi naziv" );
            }

        } 

        public function checkInsertCopies($copiesFields){
            foreach( $copiesFields as $copieField ){
                if( !isset($copieField) ){
                    array_push( $this->errorMessages, "Unesite broj kopija knjige" );
                }
            }
        }

        public function checkAddressFields( $addresses ){

            foreach( $addresses as $key => $address){
                foreach($address as $addressField){
                    if( $addressField === '' ){
                        array_push( $this->errorMessages, "Sva polja vezana za adresu su obavezna" );
                    }
                }
            }
        }

        public function checkBookWarehouses($warehouses){
           
           $numbers_array = [];

           foreach($warehouses as $warehouse){
               $number = count($warehouse);

               array_push( $numbers_array, $number );
           }

           if(!in_array(2,$numbers_array)){
             array_push( $this->errorMessages, "Potrebno je uneti knjige u bar jedno skladište" );
           }
        }
         

    }