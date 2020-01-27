<?php
    Class BookComments {

        private $query;

        public function __construct($query){
            $this->query = $query;
        }

        public function getComment( $commentId ){
            $sql = "SELECT comments.id,comments.comment,concat(users.first_name,' ',users.last_name) AS user FROM comments JOIN users ON users.id = comments.user_id WHERE comments.id = :commentId";
            $array = [
                ':commentId' => $commentId
            ];
            $comment = $this->query->returnRows( $sql,$array,true );
            return $comment ? $comment : [];
        }

        public function getAllComments(){
            $sql = "SELECT id,concat(first_name,' ',last_name) AS name FROM users";
            $users = $this->query->returnRows($sql);
            foreach( $users as $user ){
                $user->comments = $this->getUserComments($user->id);
            }
            return $users ? $users : [];
        }

        public function getUserComments( $userId ){
            $sql = "SELECT comments.id,comments.comment,comments.approve,books.name AS knjiga FROM comments JOIN books ON books.id = comments.book_id WHERE user_id = :userId";
            $array = [
               ':userId' =>  $userId
            ];
            $comments = $this->query->returnRows($sql,$array);
            return $comments ? $comments : [];
        }

        public function getBookCooments( $bookId ){
            $sql = "SELECT comments.id,comments.approve,comments.comment,concat(users.first_name,' ',users.last_name) AS user,users.img AS userImage FROM comments JOIN users ON users.id = comments.user_id WHERE comments.book_id = :bookId";
            $array = [
                ':bookId' => $bookId
            ];
            $comments = $this->query->returnRows( $sql,$array );
            return $comments ? $comments : [];
        }

        public function approveComment($commentId){
            $sql = "SELECT approve FROM comments WHERE id = :commentId";
            $array = [
                ':commentId' => $commentId
            ];
            $comment = $this->query->returnRows($sql,$array,true);
           
            $sql = "UPDATE comments SET approve = :approve WHERE id = :commentId";
            if($comment->approve === '1'){             
                $array = [
                    ':approve' => '0',
                    ':commentId' => $commentId
                ];
            }else{
                $array = [
                    ':approve' => '1',
                    ':commentId' => $commentId
                ];
            }
            $updateComment = $this->query->runQuery( $sql,$array );
            return $updateComment ? true : false;
        }

        public function insertComment($inputArray){
       
          $sql = "INSERT INTO comments(comment,date,approve,book_id,user_id)VALUES(:comment,:date,:approve,:bookId,:userId)";
          $array = [
              ':comment' => trim($inputArray['komentar']),
              ':date' =>  date("Y-m-d h:i:s"),
              ':approve' => '0',
              ':bookId' => trim($inputArray['id_knjige']),
              ':userId' => $_SESSION['userId']
          ];
          $insertComment = $this->query->runQuery( $sql,$array );
          if($insertComment){
                $bookComments = $this->getBookCooments( $inputArray['id_knjige'] );
                return count($bookComments);
          }else{
              return false;
          }
          
        }

        public function deleteComment( $commentId ){
            $sql = "DELETE FROM comments WHERE id = :commentId";
            $array = [
                ':commentId' => $commentId 
            ];
            $deleteComment = $this->query->runQuery($sql,$array);
            return $deleteComment ? true : false;
        }
    }