<?php
    Class BookLanguage {

        public function __construct($query){
            $this->query = $query;
        }

        public function getLanguages(){
            $sql = 'SELECT * FROM languages';
            $languages = $this->query->returnRows($sql);
            return $languages ? $languages : [];
        }

        public function createLanguage($inputArray){
            var_dump($inputArray);
            exit;
            $sql = "INSERT INTO languages(name)VALUES(:name)";
            $array = array(
                ':name' => trim(ucfirst($inputArray['jezik']))
            );
            $insertLanguage = $this->query->runQuery($sql, $array);
            return $insertLanguage ? true : false;
        }
        public function deleteLanguage($languageId){
            $sql = "DELETE FROM languages WHERE id = :languageId";
            $array = [
                ':languageId' => $languageId
            ];
            $deleteLanguage = $this->query->runQuery($sql,$array);
            return $deleteLanguage ? true : false;
        }
    }