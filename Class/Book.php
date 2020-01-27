<?php
    class Book{

        private $query;

        public function __construct($query){
            $this->query = $query;
        }

        public function getBooks(){
            $sql = "SELECT books.id,books.name AS title,books.img,genres.name AS genre,book_language_warehouse.book_id,book_language_warehouse.autor_id FROM book_language_warehouse";
            $sql .= " JOIN books ON books.id = book_language_warehouse.book_id";
            $sql .= " JOIN genres ON genres.id = book_language_warehouse.genre_id ORDER BY books.name ASC";
            $books = $this->query->returnRows($sql);
            foreach( $books  as $book ){
                $book->autors = $this->getBookAutors( $book->autor_id );
                
            }
            
            return $books ? $books : [];
        }

        public function bookDetails($bookId){
            $sql  = "SELECT books.id,books.name,books.img,books.isbn,books.price,books.download_link,books.about_book,books.format,books.page_number,books.letter,books.binding,books.year_of_publish,books.genre_id,genres.name AS genre,genres.id AS genreId,";
            $sql  .= "book_language_warehouse.autor_id,book_language_warehouse.language_id,book_language_warehouse.warehouse_id,book_language_warehouse.number_of_copies"; 
            $sql .= " FROM book_language_warehouse";
            $sql .= " JOIN books ON books.id = book_language_warehouse.book_id"; 
            $sql .= " JOIN genres ON genres.id = book_language_warehouse.genre_id";
            $sql .= " WHERE book_language_warehouse.book_id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $book = $this->query->returnRows($sql, $array, true);
            if( is_object($book) ){
               $book->autors = $this->getBookAutors( $book->autor_id );
               $book->language = $this->getBookLanguages( $book->language_id );
               $book->warehouses = $this->getBookWarehouses( $book->warehouse_id, $book->number_of_copies  );
               $book->number_of_copies = json_decode( $book->number_of_copies );
            }
            return $book ? $book : [];
        }

        public function getBookById($id){
            $sql = "SELECT * FROM books WHERE id = :bookid";
            $array = [
                ':bookid' => $id
            ];
            $book = $this->query->returnRows( $sql,$array,true);
            if( $book ){
                $book->autors = $this->getAutors( $book->id );
            } 
            return $book; 
        }
        public function getAutors( $bookId ){
            $sql = "SELECT concat(autors.first_name,' ',autors.last_name) AS autor FROM book_autor JOIN autors ON autors.id = book_autor.autor_id WHERE book_autor.book_id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $autors = $this->query->returnRows( $sql,$array );
            return $autors ? $autors : [];
        }

        public function getBookByGenre( $genreId ){
            $sql = "SELECT books.id FROM books JOIN genres ON genres.id = books.genre_id WHERE genres.id = :genreId";
            $array = [
                ':genreId' => $genreId
            ];
            $books = $this->query->returnRows( $sql,$array );
            foreach($books as $book){
                $book->details = $this->bookDetails( $book->id );
            }
            return $books ? $books : [];
        }

        public function getBookAutors( $autorsIds ){
          
            $autor_ids = json_decode( $autorsIds );

            $autors = [];

            foreach( $autor_ids as $autorId ){
                
                $autorId = (int)$autorId;

                $sql = "SELECT autors.id,concat(autors.first_name,' ',autors.last_name) AS autor,autors.img,autors.date_of_birth,autors.biography FROM autors WHERE id = :autorId";
                $array = [
                    ':autorId' => $autorId
                ];
                $autor = $this->query->returnRows( $sql,$array,true );
                array_push($autors, $autor);
            }

            return $autors ? $autors : [];
        }

        public function getBookLanguages( $languageId ){
        
            $sql = "SELECT * FROM languages WHERE id = :languageId";
            $array = [
                ':languageId' => $languageId
            ];
            $language = $this->query->returnRows($sql, $array, true);
            return $language ? $language : [];
        }

        public function getBookWarehouses( $warehouseIds, $numberOfCopies ){
            
         
            $warehouseIds = json_decode( $warehouseIds );
            $numberOfCopies = json_decode( $numberOfCopies );
    
           
            $warehouses = [];

            foreach( $warehouseIds as $key => $warehouseId ){

                $warehouseId = (int)$warehouseId;

                $sql = "SELECT * FROM warehouses WHERE id = :warehouseId";
                $array = [
                    ':warehouseId' => $warehouseId
                ];
                $warehouse = $this->query->returnRows( $sql,$array,true );
                $warehouse->number_of_book_copies = $numberOfCopies[ $key ];

                array_push( $warehouses,$warehouse );
            }

            return !empty( $warehouses ) ? $warehouses : []; 
        }


        public function createBook($inputArray, $file, $img){

            if( $this->uploadFile($file) && $this->uploadImage($img) ){

                $sql = "INSERT INTO books(name,isbn,download_link,price,img,about_book,format,page_number,letter,binding,year_of_publish,genre_id)VALUES(:name,:isbn,:download_link,:price,:img,:about_book,:format,:page_number,:letter,:binding,:year_of_publish,:genre_id)";
               // var_dump($sql);exit;
                $array = [
                    ':name' => trim(ucfirst($inputArray['naziv_dela'])),
                    ':isbn' => trim($inputArray['šifra']),
                    ':download_link' => trim( $file['name']),
                    ':price' => trim( floatval($inputArray['cena']) ),
                    ':img' => trim($img['name']),
                    ':about_book' => trim( $inputArray['o_knjizi'] ),
                    ':format' => trim( $inputArray['format'] ),
                    ':page_number' => trim( $inputArray['broj_strana'] ),
                    ':letter' => trim( $inputArray['pismo'] ),
                    ':binding' => trim( $inputArray['povez']),
                    ':year_of_publish' => trim(date("Y-m-d",strtotime($inputArray['godina_izdanja']))),
                    ':genre_id' => (int)trim($inputArray['žanr'])
                ];
                

                 $createBook = $this->query->runQuery($sql, $array);     
                 if($createBook){
                     $book_id = (int)$this->query->lastInsertId();

                    $insert_book_autors = $this->insertBookAutors($inputArray['autori'], $book_id);
                    $insert_book_language = $this->insertBookLanguage($inputArray['jezik'], $book_id);  
                    $insert_book_warehouses = $this->insertBookWareHouses($inputArray['skladista'], $book_id);  
                    if( $insert_book_autors && $insert_book_language && $insert_book_warehouses ){
                        return $this->insertMidleTable( $inputArray, $book_id );
                    }else{
                        throw new Exception('Error insert book autors');
                    }
                }
            }
        }

        public function insertBookAutors($autorsIds, $bookId){

            $counter = 0;

            foreach($autorsIds as $autorId){
                $sql = "INSERT INTO book_autor(book_id,autor_id)VALUES(:book_id,:autor_id)";
                $array = [
                    ':book_id' => trim($bookId),
                    ':autor_id' => trim($autorId)
                ];
                $insert_book_autors = $this->query->runQuery($sql, $array);
                if($insert_book_autors){
                    $counter++;
                }
            }

            return ( $counter > 0 ) ? true : false;
        }

        public function insertBookLanguage( $languageId, $bookId ){

            $sql = "INSERT INTO book_language(book_id,language_id)VALUES(:bookId,:languageId)";
            $array = [
                ':bookId' => $bookId,
                ':languageId' => (int)$languageId
            ];
            $insertLanguage = $this->query->runQuery($sql,$array);
            return $insertLanguage ? true : false;
        }

        public function insertBookWareHouses( $wareHousesIds, $bookId ){

            $counter = 0;

            foreach( $wareHousesIds as $key => $wareHouseId ){
                $sql = "INSERT INTO book_warehouse(book_id,warehouse_id)VALUES(:book_id,:warehouse_id)";
                $array = [
                    ':book_id' => $bookId,
                    ':warehouse_id' => $wareHouseId
                ];
                $insert_book_wareHouse = $this->query->runQuery($sql, $array);
                if($insert_book_wareHouse){
                    $counter++;
                }
            }

            return ( $counter > 0 ) ? true : false;
        }

        public function insertMidleTable( $inputArray, $bookId ){

                $jezik = $inputArray['jezik'];
                $autori = json_encode( $inputArray['autori'] );
                $zanr = $inputArray['žanr'];
                $skladista = json_encode( $inputArray['skladista'] );
                $booksCopies = $inputArray['broj_kopija'];

                $number_of_copies = [];

                foreach($booksCopies as $bookCopy){
                    if( !empty($bookCopy) ){
                        array_push( $number_of_copies, $bookCopy );
                    }
                }

                $encode_number_of_copies = json_encode( $number_of_copies );

                $sql = "INSERT INTO book_language_warehouse(book_id,language_id,warehouse_id,number_of_copies,autor_id,genre_id)VALUES(:book_id,:language_id,:warehouse_id,:number_of_copies,:autor_id,:genre_id)";
                $array = [
                    ':book_id' => $bookId,
                    ':language_id' => $jezik,
                    ':warehouse_id' => $skladista,
                    ':number_of_copies' => $encode_number_of_copies,
                    ':autor_id' => $autori,
                    ':genre_id' => $zanr  
                ];
                return $this->query->runQuery($sql,$array);
        }

        public function uploadFile($uploadFile){

            $file_name = trim(basename($uploadFile['name']));
            $tmp_name = trim($uploadFile['tmp_name']);

            $file_path = "../../asets/book_files";

            return move_uploaded_file($tmp_name, $file_path.'/'.$file_name );   
        }

        public function uploadImage($uploadFile){

            $image_name = trim(basename($uploadFile['name']));
            $tmp_name = trim($uploadFile['tmp_name']);

            $file_path = "../../asets/book_img";

            return move_uploaded_file($tmp_name, $file_path.'/'.$image_name );   
        }

        public function getNumberOfBooks(){
            $books = $this->getBooks();
            $count = count($books);
            $count++;

            return $count;
        }

        public function UpdateBook( $inputArray, $file, $img, $bookId ){

            $array = [
                ':name' => trim(ucfirst($inputArray['naziv_dela'])),
                ':isbn' => trim($inputArray['šifra']),
                ':price' => trim( floatval($inputArray['cena']) ),
                ':genre_id' => (int)trim($inputArray['žanr']),
                ':about_book' => trim( $inputArray['o_knjizi'] ),
                ':format' => trim( $inputArray['format'] ),
                ':page_number' => trim( $inputArray['broj_strana'] ),
                ':letter' => trim( $inputArray['pismo'] ),
                ':binding' => trim( $inputArray['povez'] ),
                ':year_of_publish' => trim( $inputArray['godina_izdanja'] ),
                ':bookId' => trim($bookId)
            ];

            if( empty($file['name']) || empty($img['name']) ){

                $sql = "UPDATE books SET name = :name,isbn = :isbn,price = :price,about_book = :about_book,";
                $sql .="format = :format,page_number = :page_number,letter = :letter,binding = :binding,year_of_publish = :year_of_publish,genre_id = :genre_id";
                $sql .= " WHERE id = :bookId";

            }else{

                if( $this->uploadFile($file) || $this->uploadImage($img) ){

                    $sql = "UPDATE books SET name = :name,isbn = :isbn,download_link = :download_link,price = :price,";
                    $sql .= "img = :img,genre_id = :genre_id ";
                    $sql .= "WHERE id = :bookId";
                
                    $array[':download_link'] = trim( $file['name'] );
                    $array[':img'] = trim($img['name']);
                }

            }
     
            $updateBook = $this->query->runQuery($sql, $array);
            if($updateBook){
                
                $update_book_autors = $this->updateBookAutors($inputArray['autori'], $bookId);
                $update_book_languages = $this->updateBookLanguage($inputArray['jezik'], $bookId);
                $update_book_warehouses = $this->updateBookWareHouses($inputArray['skladista'], $bookId);

                if( $update_book_autors && $update_book_languages && $update_book_warehouses ){
                    return $this->updateMidleTable( $inputArray,$bookId );
                }else{
                    throw new Exception('Greska pri updajtovanju srednjih kolona');
                }
            }
            
        }

        public function updateBookAutors($autorsIds, $bookId){

            if($this->deleteBookAutors($bookId)){

               return $this->insertBookAutors($autorsIds, $bookId);

            }
        }

        public function updateBookLanguage( $languageId, $bookId ){

            if($this->deleteBookLanguages($bookId)){

                return $this->insertBookLanguage($languageId, $bookId);
 
             }
        }

        public function updateBookWareHouses( $wareHousesIds, $bookId ){

            if($this->deleteBookWarehouses($bookId)){

                return $this->insertBookWareHouses($wareHousesIds, $bookId);
 
            }
        }

        public function updateMidleTable( $inputArray,$bookId ){

            $jezik = $inputArray['jezik'];
            $autori = json_encode( $inputArray['autori'] );
            $zanr = $inputArray['žanr'];
            $skladista = json_encode( $inputArray['skladista'] );
            $booksCopies = $inputArray['broj_kopija'];

            $number_of_copies = [];

            foreach($booksCopies as $bookCopy){
                if( !empty($bookCopy) ){
                    array_push( $number_of_copies, $bookCopy );
                }
            }

            $encode_number_of_copies = json_encode( $number_of_copies );

            $sql = "UPDATE book_language_warehouse SET language_id = :language_id,warehouse_id = :warehouse_id,number_of_copies = :number_of_copies,autor_id = :autor_id,genre_id = :genre_id";
            $sql .= " WHERE book_id = :book_id";
            $array = [
                ':language_id' => $jezik,
                ':warehouse_id' => $skladista,
                ':number_of_copies' => $encode_number_of_copies,
                ':autor_id' => $autori,
                ':genre_id' => $zanr,
                ':book_id' => $bookId
            ];
            $updateMiddleTable = $this->query->runQuery($sql, $array);
            return $updateMiddleTable ? true : false;
        }

        public function deleteBookAutors($bookId){
            $sql = "DELETE FROM book_autor WHERE book_id = :book_id";
            $array = [
                ':book_id' => $bookId
            ];
            $deleteAutors = $this->query->runQuery($sql, $array);
            return $deleteAutors ? true: false;
        }

        public function deleteBookLanguages($bookId){
            $sql = "DELETE FROM book_language WHERE book_id = :book_id";
            $array = [
                ':book_id' => $bookId
            ];
            $deleteLanguages = $this->query->runQuery($sql, $array);
            return $deleteLanguages ? true: false;
        }

        public function deleteBookWarehouses($bookId){
            $sql = "DELETE FROM book_warehouse WHERE book_id = :book_id";
            $array = [
                ':book_id' => $bookId
            ];
            $deleteWarehouses = $this->query->runQuery($sql, $array);
            return $deleteWarehouses ? true: false;
        }

        public function deleteBook($id){
            
            $book = $this->bookDetails($id);
            $bookImage = $book->img;
            
            if($this->deleteBookImage($bookImage)){

                $sql = "DELETE FROM books WHERE id = :bookId";
                $array = [
                    ':bookId' => $id
                ];
                $deleteBook = $this->query->runQuery($sql, $array);
                return $deleteBook ? true : false;
            }
        }

        public function deleteBookImage($image){
          
            if( file_exists('../../asets/book_img/'.$image) ){
              return unlink('../../asets/book_img/'.$image);
            }else{
                echo "ne postoji";
            }

        }

        public function test(){

           $sql = "SELECT * FROM book_language_warehouse_json";
           $results = $this->query->returnRows($sql);
//           var_dump($results);

           foreach($results as $result){
               $result->languages = $this->getLenguages($result->language_id);
           }
        
        }
        public function getLenguages($languages){
            $languagesIds = json_decode($languages);

            $languages = [];

            foreach($languagesIds as $languageId){
   
                $sql = "SELECT name FROM languages WHERE id = :languageId";
                $array = [
                    ':languageId' => $languageId
                ];
                $language =  $this->query->returnRows($sql,$array,true);
                array_push($languages, $language);
            }

            return $languages;
        }

        public function likeBook( $bookId ){
            $sql = "INSERT INTO likes(does_like,book_id,user_id)VALUES(:does_like,:book_id,:user_id)";
            $array = [
                ':does_like' => '1',
                ':book_id' => trim($bookId),
                ':user_id' => $_SESSION['userId']
            ];
            $likeBook = $this->query->runQuery( $sql,$array);
            if($likeBook){
                return $this->countUsersWhoLikesBook( $bookId );
            }else{
                return false;
            }
        }

        public function countUsersWhoLikesBook( $bookId ){

            $sql = "SELECT concat(users.first_name,' ',users.last_name) AS name FROM likes JOIN users ON users.id = likes.user_id WHERE likes.book_id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $users = $this->query->returnRows($sql, $array);
            return !empty($users) ? count($users) : '0';
        }

        public function doesLogedInUserLikeBook($book){

            if(isset($_SESSION['userId'])){

                $sql = "SELECT * FROM likes WHERE user_id = :userId AND book_id = :bookId";
                $array = [
                    ':userId' => $_SESSION['userId'],
                    ':bookId' => $book
                ];
                $user = $this->query->returnRows($sql,$array,true);
                return $user ? true : false;
            }
            return false;
        }

        public function getUsersWhoLikeBook( $bookId ){

            $sql = "SELECT concat(users.first_name,' ',users.last_name) AS name FROM likes JOIN users ON users.id = likes.user_id WHERE book_id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $users = $this->query->returnRows( $sql,$array );
            return $users ? $users : [];
        }

        public function getLastInsertBooks( ){

            $sql = "SELECT books.id,books.name,concat(autors.first_name,' ',autors.last_name) AS autors,books.img FROM book_autor JOIN books ON books.id = book_autor.book_Id ";
            $sql .="JOIN autors ON autors.id = book_autor.autor_id ORDER BY book_autor.book_id DESC LIMIT 6";
            $getBooks = $this->query->returnRows( $sql );
            return $getBooks ? $getBooks : []; 
        }
        
        public function getBooksByGenre( $genreName ){

            $sql = "SELECT books.id FROM books JOIN genres ON genres.id = books.genre_id WHERE genres.name = :genreName";
            $array = [
                ':genreName' => $genreName
            ];
            $books = $this->query->returnRows($sql,$array);

            $childrenBooks = [];

            foreach($books as $book){
                
                $getBook = $this->bookDetails( $book->id );
                array_push( $childrenBooks, $getBook );
            }

            return $childrenBooks ? $childrenBooks : []; 
        }

        public function serachBookByName( $bookName ){

            $sql = "SELECT * FROM books WHERE name LIKE :bookName";
            $array = [
                ':bookName' => $bookName.'%'
            ];
            $books = $this->query->returnRows($sql,$array);

            $booksSearchByName = [];

            foreach( $books as $book ){

                $getBook = $this->bookDetails( $book->id );

                array_push( $booksSearchByName,$getBook );
            }

            return is_array( $booksSearchByName ) ? $booksSearchByName : [];
        }

        public function getBooksFromeSameGenre( $genreId ){
            $sql = "SELECT id FROM books WHERE genre_id = :genreId LIMIT 5";
            $array = [
                ':genreId' => $genreId
            ];
            $books = $this->query->returnRows( $sql,$array );

            $genreBooks = [];

            foreach( $books as $book ){
                $getBook = $this->bookDetails( $book->id );
                $genreBooks[] = $getBook;  
            }
            return !empty($genreBooks) ? $genreBooks : [];
        }

        public function getBooksPerPage( $offset, $no_of_records_per_page ){            

            $sql = "SELECT books.id,books.name AS title,books.img,genres.name AS genre,book_language_warehouse.book_id,book_language_warehouse.autor_id FROM book_language_warehouse";
            $sql .= " JOIN books ON books.id = book_language_warehouse.book_id";
            $sql .= " JOIN genres ON genres.id = book_language_warehouse.genre_id ORDER BY books.name ASC LIMIT $offset, $no_of_records_per_page";

            $books = $this->query->returnRows( $sql );
            foreach( $books as $book ){
                $book->autors = $this->getBookAutors( $book->autor_id );
            }
            return $books ? $books : [];
        }

        public function getBooksPerGenre( $offset, $no_of_records_per_page, $genreId){
            
            $sql = "SELECT books.id FROM books JOIN genres ON genres.id = books.genre_id WHERE genres.id = :genreId LIMIT $offset, $no_of_records_per_page";
            $array = [
                ':genreId' => $genreId
            ];
            $books = $this->query->returnRows( $sql,$array );
            foreach($books as $book){
                $book->details = $this->bookDetails( $book->id );
            }
            return $books ? $books : [];
        }
    } 