<?php

    class Database {

        public $db;

        public function __construct(){
            $this->connectDB();
        }

        public function connectDB(){
        
            $dsn = "mysql:host=localhost;dbname=book_library;charset=utf8";
            $username = "root";
            $password = "";

            try{
                $this->db = new PDO($dsn, $username, $password);
            }catch(PDOException $e){
            
                die("Nema konekcije");
            }
            
        }

    }

