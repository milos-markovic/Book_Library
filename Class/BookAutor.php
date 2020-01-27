<?php
    class BookAutor {

        private $query;

        public function __construct($query){
            $this->query = $query;
        }

        public function getAutors(){
            $sql = "SELECT * FROM autors";
            $autors = $this->query->returnRows($sql);
            return $autors ? $autors : [];
        }

        public function createAutor($inputArray, $file){

            if($this->uploadImage($file)){

                $sql = "INSERT INTO autors(first_name,last_name,title,date_of_birth,biography,img)VALUES(:first_name,:last_name,:title,:date_of_birth,:biography,:img)";
                $array = [
                    ':first_name' => ucfirst(trim($inputArray['ime'])),
                    ':last_name' => ucfirst(trim($inputArray['prezime'])),
                    ':title' => trim($inputArray['titula']),
                    ':date_of_birth' => trim(date("Y-m-d",strtotime($inputArray['date_of_birth']))),
                    ':biography' => trim($inputArray['biografija']),
                    ':img' => trim(basename($file['name']))
                ];
                $createAutor = $this->query->runQuery($sql,$array);
                return $createAutor ? true : false;
              
            }
        }

        public function getAutor($autorId){
            $sql = "SELECT * FROM autors WHERE id = :autorId";
            $array = [
                ':autorId' => $autorId
            ];
            $autor = $this->query->returnRows($sql, $array, true);
            return $autor ? $autor : [];
        }

        public function updateAutor($inputArray, $autorId, $file){

            $array = [
                ':first_name' => trim(ucfirst($inputArray['ime'])),
                ':last_name' => trim($inputArray['prezime']),
                ':title' => trim($inputArray['titula']),
                ':date_of_birth' => trim($inputArray['datum_rodjenja']),
                ':biography' => trim($inputArray['biografija']),
                ':autorId' => $autorId
            ];
           
            if(!empty($file['name'])){
                
                if( $this->uploadImage($file) ){

                    $sql = "UPDATE autors SET first_name = :first_name,last_name = :last_name,title = :title,date_of_birth = :date_of_birth,biography = :biography,img = :img";
                    $sql .= " WHERE id = :autorId";

                    $array[':img'] = trim(basename($file['name']));
                    $updateAutor = $this->query->runQuery($sql,$array);
                    return $updateAutor ? true : false;
                }
            }else{
                $sql = "UPDATE autors SET first_name = :first_name,last_name = :last_name,title = :title,date_of_birth = :date_of_birth,biography = :biography";
                $sql .= " WHERE id = :autorId";
                
                $pdateAutor = $this->query->runQuery($sql,$array);
                return $pdateAutor ? true : false;
            }  
        }

        public function deleteAutor($autorId){
        
            $autor = $this->getAutor($autorId);

            if( $this->deleteAutorImage($autor->img) ){

                $sql = "DELETE FROM autors WHERE id = :autorId";
                $array = [
                    ':autorId' => $autorId
                ];
                $deleteAutor = $this->query->runQuery($sql, $array);
                return $deleteAutor ? true : false;
            }
        }

        public function uploadImage($uploadFile){

            $image_name = trim(basename($uploadFile['name']));
            $tmp_name = trim($uploadFile['tmp_name']);

            $file_path = "../../asets/autor_img";

            return move_uploaded_file($tmp_name, $file_path.'/'.$image_name );   
        }

        public function deleteAutorImage($img){
            return unlink('../../asets/autor_img/'.$img);
        }

    }