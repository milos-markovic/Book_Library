<?php

class News {

    private $query;

    public function __construct($query){
        $this->query = $query;
    }

    public function getAllNews(){
        $sql = "SELECT * FROM news";
        $news = $this->query->returnRows($sql);
        return $news ? $news : [];
    }

    public function getNews($id){
        $sql = "SELECT * FROM news WHERE id = :newsId";
        $array = [
            ':newsId' => $id
        ];
        $getNews = $this->query->returnRows($sql, $array, true);
        return $getNews ? $getNews : [];
    }

    public function createNews($inputArray, $file){

      
        if( $this->uploadImage($file) ){

            $sql = "INSERT INTO news(title,news,autor,img,date)VALUES(:title,:news,:autor,:img,:date)";
            $array = [
                ':title' => trim(ucfirst($inputArray['naslov'])),
                ':news' => trim(ucfirst($inputArray['vest'])),
                ':autor' => trim(ucfirst($inputArray['autor'])),
                ':img' => trim(basename($file['name'])),
                ':date' => trim(date("Y-m-d",strtotime($inputArray['datum'])))
            ];
            $createNews = $this->query->runQuery($sql, $array);
            return $createNews ? true : false;
        }

    }

    public function uploadImage($uploadFile){

        $image_name = trim(basename($uploadFile['name']));
        $tmp_name = trim($uploadFile['tmp_name']);

        $file_path = "../../asets/news_img";

        return move_uploaded_file($tmp_name, $file_path.'/'.$image_name );   
    }

    public function updateNews( $inputArray, $uploadImage, $newsId ){

        // var_dump($uploadImage);
        // exit;

        $array = [
            ':title' => trim($inputArray['naslov']),
            ':news' => trim($inputArray['vest']),
            ':autor' => trim($inputArray['autor']),
            ':date' => date("Y-m-d H:i:s"),
            ':newsId' => $newsId
        ];

        if( !empty($uploadImage['name']) ){
            
            if( $this->uploadImage( $uploadImage ) ){

                $sql = "UPDATE news SET title = :title,:news = :news,autor = :autor,img = :img,date = :date WHERE id = :newsId";
                $array[':img'] = trim(basename($uploadImage['name']));

                $updateNews = $this->query->runQuery($sql, $array);
                return $updateNews ? true : false;
            }

        }else{

            $sql = "UPDATE news SET title = :title,news = :news,autor = :autor,date = :date WHERE id = :newsId";
            $updateNews = $this->query->runQuery($sql, $array);
            return $updateNews ? true : false;
        }
    }

    public function deleteNews( $newsId ){

        if( $this->deleteNewsImage( $newsId ) ){

            $sql = "DELETE FROM news WHERE id = :newsId";
            $array = [
                ':newsId' => $newsId
            ];
            $deleteNews = $this->query->runQuery( $sql, $array );
            return $deleteNews ? true : false;
        }
    }

    public function deleteNewsImage( $newsId ){

        $news = $this->getNews( $newsId );

        if( file_exists('../../asets/news_img/'.$news->img) ){
            return unlink( '../../asets/news_img/'.$news->img );
        }else{
            echo "Ne postoji slika";
        }

    }

    public function getLastNews(){
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 4";
        $news = $this->query->returnRows( $sql );
        return $news ? $news : [];
    }

    
}