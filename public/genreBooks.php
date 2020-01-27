<?php
    require '../bootstrap.php';

    $genreId = $_GET['id'];
    $genres = $genre->getGenres();

    $getGenre = $genre->getGenre( $genreId );

    $getProductsFromShopingCart = $session->getProductsFromShopingCart();



    // get genre books with pagination

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 12;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $books = $book->getBookByGenre( $genreId );
    $totalBooks = count( $books );

    $total_pages = ceil( $totalBooks / $no_of_records_per_page );

    $getBooksPerGenre = $book->getBooksPerGenre( $offset, $no_of_records_per_page, $genreId );

    
    


    
    require "view/genreBooks.view.php";