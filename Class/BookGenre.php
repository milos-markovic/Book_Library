<?php

class BookGenre {

    public function __construct($query){
        $this->query = $query;
    }

    public function getGenre( $genreId ){
        $sql = "SELECT * FROM genres WHERE id = :genreId";
        $array = [
            ':genreId' => $genreId
        ];
        $genre = $this->query->returnRows( $sql,$array,true );
        return $genre ? $genre : [];
    }

    public function getGenres(){
        $sql = "SELECT id,name FROM genres";
        $genres = $this->query->returnRows($sql);
        foreach($genres as $genre){
            $genre->books = $this->getBooksByGenre( $genre->id );
            $genre->numberOfBooks = count( $genre->books );
        }
        return $genres ? $genres : [];
    }

    public function getBooksByGenre( $genreId ){
        $sql = "SELECT books.id,books.name FROM books WHERE genre_id = :genreId";
        $array = [
            ':genreId' => $genreId
        ];
        $books = $this->query->returnRows( $sql,$array );
        return $books ? $books : [];
    }

    // public function getBookIdByGenreName( $genreName ){
    //     $sql = "SELECT books.id FROM books JOIN genres ON genres.id = books.genre_id WHERE genres.name = :genreName";
    //     $array = [
    //         ':genreName' => $genreName
    //     ];
    //     return $this->query->returnRows($sql,$array);
    // }

    public function createGenre($inputAarray){
        $sql = "INSERT INTO genres(name)VALUE(:name)";
        $array = [
            ':name' => trim($inputAarray['naziv_žanra'])
        ];
        $insertGenre = $this->query->runQuery($sql, $array);
        return $insertGenre ? true : false;
    }

    public function deleteGenre($genreId){
        $sql = "DELETE FROM genres WHERE id = :genreId";
        $array = [
            ':genreId' => $genreId
        ];
        $deleteGenre = $this->query->runQuery($sql, $array);
        return $deleteGenre ? true : false;
    }
}