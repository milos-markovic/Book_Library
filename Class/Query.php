 <?php

    class Query {

        private $pdo;

        public function __construct($db){
            $this->pdo = $db;
        }

        public function returnRows($query, $array = [], $returnQuery = false){
            
           if(isset($query)){
               $stm = $this->pdo->prepare($query);
           }

           if(!empty($array)){
              $result = $stm->execute($array);
           }else{
              $result = $stm->execute();
           }
       
           if($result){
              return $returnQuery ? $stm->fetch(PDO::FETCH_OBJ) : $stm->fetchAll(PDO::FETCH_OBJ);
           }else{
               die("error return rows");
           }
        }

        public function runQuery($query, $array = []){

            if(isset($query)){
                $stm = $this->pdo->prepare($query);
            }
 
            if(!empty($array)){
               $result = $stm->execute($array);
            }else{
               $result = $stm->execute();
            }
            
            return $result ? $result : die("error run query");
        }

        public function lastInsertId(){
           return $this->pdo->lastInsertId();
        }

   

        

    }