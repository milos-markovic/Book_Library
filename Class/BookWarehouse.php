<?php
    class BookWarehouse {
        
        public function __construct($query){
            $this->query = $query;
        }

        public function getWarehouses(){
            
            $sql = "SELECT * FROM warehouses";
            $warehouses = $this->query->returnRows($sql);
            foreach($warehouses as $key => $warehouse){
                $warehouse->books = $this->getBooksFromWarehouse( $warehouse->id,$key );
                //$warehouse->middleTableId = $this->getMidleTableId( $warehouse->books[$key]->id );
                
            }
            // var_dump($warehouses);
            // exit;
           
            return $warehouses ? $warehouses : [];

        }

        public function getWarehouse( $warehouseId, $warehouseKey ){

            $sql = "SELECT * FROM warehouses WHERE id = :warehouseId";
            $array = [
                ':warehouseId' => $warehouseId
            ];
            $warehouse = $this->query->returnRows($sql, $array, true);
            if( is_object($warehouse) ){
                $warehouse->books = $this->getBooksFromWarehouse( $warehouse->id,$warehouseKey );
            }

           return $warehouse ? $warehouse : [];
        }

        public function getBooksFromWarehouse( $warehouseId, $warehouseKey ){

            $sql = "SELECT * FROM book_language_warehouse JOIN book_warehouse ON book_warehouse.book_id = book_language_warehouse.book_id ";
            $sql .= "WHERE book_warehouse.warehouse_id = :warehouse_id";
            $array = [
                ':warehouse_id' => $warehouseId
            ];
            $results = $this->query->returnRows($sql, $array);
            if( is_array($results) ){
                foreach($results as $result){
    
                    $result->book = $this->getBook( $result->book_id );
                    $result->autors = $this->getBookAutors( $result->autor_id );
                    $result->language = $this->getBookLanguage( $result->language_id );
                    $result->genre = $this->getBookGenre( $result->genre_id );
                    $result->bookCopies = $this->getBookCopies( $result->number_of_copies, $warehouseKey );
                }
            }
            return $results ? $results : [];
        }

        public function getBook( $bookId ){
            $sql = "SELECT name FROM books WHERE id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $book = $this->query->returnRows( $sql,$array,true );
            return $book ? $book->name : []; 
        }

        public function getBookLanguage( $languageId ){
            $sql = "SELECT name FROM languages WHERE id = :languageId";
            $array = [
                ':languageId' => $languageId
            ];
            $language = $this->query->returnRows( $sql,$array,true );
            return $language ? $language->name : [];
        }

        public function getBookGenre( $genreId ){
            $sql = "SELECT name FROM genres WHERE id = :genreId";
            $array = [
                ':genreId' => $genreId
            ];
            $genre = $this->query->returnRows( $sql,$array,true );
            return $genre ? $genre->name : []; 
        }

        public function getBookAutors( $bookAutors ){
           
            $bookAutorsArray = json_decode( $bookAutors );

            $autors = [];

            foreach($bookAutorsArray as $autorId){
                $sql = "SELECT concat(first_name,' ',last_name) AS name FROM autors WHERE id = :autorId";
                $array = [
                    ':autorId' => $autorId
                ];
                $autor = $this->query->returnRows( $sql,$array,true );
                if( is_object($autor) ){
                    array_push($autors, $autor->name );
                }    
            }
            return !empty($autors) ? $autors : [];
        }

        public function getBookCopies( $numberOfCopiesArray, $arrayKey ){

            
            $copiesDecodeArray = json_decode( $numberOfCopiesArray );
            
            return !empty( $copiesDecodeArray[$arrayKey] ) ? $copiesDecodeArray[$arrayKey] : 0;
        }

        public function getNumberOfBookCopies( $bookId,$number_of_copies_array_key ){
            
            $sql = "SELECT * FROM book_language_warehouse WHERE book_id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $result = $this->query->returnRows( $sql,$array,true );
            if($result){
                $number_of_book_copies = json_decode( $result->number_of_copies );

                return $number_of_book_copies[$number_of_copies_array_key];
            }else{
                return [];
            }
        }

        public function getMidleTableId( $bookId ){
            $sql = "SELECT * FROM book_language_warehouse WHERE book_id = :bookId";
            $array = [
                ':bookId' => $bookId 
            ];
            $result = $this->query->returnRows($sql,$array,true);
            return $result ? $result->id : [];
        }

        public function getAllFromMiddleTable( $middleTableId){
            $sql = "SELECT * FROM book_language_warehouse WHERE id = :id";
            $array = [
                ':id' => $middleTableId
            ];
            return $this->query->returnRows( $sql,$array,true );
        }

        public function createWorehouse($inputArray){

            $sql = "INSERT INTO warehouses(name,quantity,address,city)VALUES(:name,:quantity,:address,:city)";
            $array = [
                ':name' => trim(ucfirst($inputArray['ime'])),
                ':quantity' => trim($inputArray['kapacitet']),
                ':address' => trim(ucfirst($inputArray['adresa'])),
                ':city' => trim(ucfirst($inputArray['grad'])),
            ];
            $createWarehouse = $this->query->runQuery($sql, $array);
            return $createWarehouse ? true : false;
        }

        public function UpdateWarehouse( $inputArray ){

            $sql = "UPDATE warehouses SET name = :name,quantity = :quantity,address = :address,city = :city WHERE id = :warehouseId";
            $array = [
                ':name' => trim($inputArray['ime']),
                ':quantity' => trim($inputArray['kapacitet']),
                ':address' => trim($inputArray['adresa']),
                ':city' => trim($inputArray['grad']),
                ':warehouseId' => trim($inputArray['warehouseId'])
            ];
            $updateWarehouse = $this->query->runQuery($sql, $array);
            return $updateWarehouse ? true : false;
        }

        public function deleteWarehouse($warehouseId){
            $sql = "DELETE FROM warehouses WHERE id = :id";
            $array = [
                ':id' => $warehouseId
            ];
            $deleteWarehouse = $this->query->runQuery($sql, $array);
            return $deleteWarehouse ? true : false;
        }

        public function deleteBooksFromWarehouse( $bookId,$warehouseId,$numberOfBookCopiesKey ){

            $sql = "DELETE FROM book_warehouse WHERE book_id = :bookId AND warehouse_id = :warehouseId";
            $array = [
                ':bookId' => $bookId,
                ':warehouseId' => $warehouseId
            ];
            $deleteBookFromWarehouse = $this->query->runQuery($sql, $array);

            if($deleteBookFromWarehouse){
               return $this->deleteBooksFromMiddleTable( $bookId,$numberOfBookCopiesKey );
            }else{
                throw new Exception('Greska nastala brilikom brisanja iz book_warehouse');
            }
        }

        public function deleteBooksFromMiddleTable( $bookId,$numberOfBookCopiesKey ){

            $sql = "SELECT number_of_copies FROM book_language_warehouse WHERE book_id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $result = $this->query->returnRows( $sql,$array,true );

            if($result){
                $decodeNumberOfCopies = json_decode($result->number_of_copies);               
                $decodeNumberOfCopies[$numberOfBookCopiesKey] = "";

                $sql_update = "UPDATE book_language_warehouse SET number_of_copies = :number_of_copies WHERE book_id = :bookId";
                $array = [
                    ':number_of_copies' => json_encode( $decodeNumberOfCopies ),
                    ':bookId' => $bookId
                ];
                $deleteBookCopies = $this->query->runQuery( $sql_update,$array );
                return $deleteBookCopies ? true : false;
            }
        }
    }