<?php
    class CommentReplies{

        private $query;

        public function __construct($query){
            $this->query = $query;
        }

        public function getReplies( $commentId ){

            $sql = "SELECT comment_replies.id,concat(users.first_name,' ',users.last_name) AS user,users.img AS userImage,comment_replies.reply FROM comment_replies"; 
            $sql .= " JOIN users ON users.id = comment_replies.user_id";
            $sql .= " WHERE comment_replies.comment_id = :commentId";
            $array = [
                ':commentId' => $commentId
            ];
            $replies = $this->query->returnRows($sql, $array);
            return $replies  ? $replies : [];
        }

        public function deleteCommentReply( $replyId ){

            $sql = "DELETE FROM comment_replies WHERE id = :replyId";
            $array = [
                ':replyId' => $replyId
            ];
            $deleteReply = $this->query->runQuery( $sql,$array );
            return $deleteReply ? true : false;
        }

        public function insertReply( $inputArray ){
            $sql = "INSERT INTO comment_replies(comment_id,user_id,reply)VALUES(:commentId,:userId,:reply)";
            $array = [
                ':commentId' => trim($inputArray['commentId']),
                ':userId' => $_SESSION['userId'],
                ':reply' => trim($inputArray['replyText'])
            ];
            $insertReply = $this->query->runQuery( $sql,$array );
            return $insertReply ? true : false;
        }
    }