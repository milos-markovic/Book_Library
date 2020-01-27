<?php

class Statistic {

    public function get_number_of_elements_per_section(){
        global $book;
        global $user;
        global $language;
        global $genre;
        global $autor;
        global $warehouse;
        global $news;
        global $comment;
        global $order;

        $countBooks = count($book->getBooks());
        $countUsers = count($user->getUsers());
        $countLanguages = count($language->getLanguages());
        $countGenres = count($genre->getGenres());
        $countAutors = count($autor->getAutors());
        $countWarehouses = count($warehouse->getWarehouses());
        $countNews = count($news->getAllNews());
        $countComments = count( $comment->getAllComments() );
        $countOrders = count($order->getOrders());

        $categories= [ 
            [
             'pozadina' => 'bg-success',
             'ikona' => '<i class="fas fa-user-friends"></i>',
             'ime kategorije' => 'Korisnici',
             'broj elemenata' => $countUsers,
             'link' => 'http://localhost/Book_Library/admin/admin/users.php'
            ],
            [
             'pozadina' => 'bg-warning',
             'ikona' => '<i class="fas fa-atlas"></i>',
             'ime kategorije' => 'Knjige',
             'broj elemenata' => $countBooks,
             'link' => 'http://localhost/Book_Library/admin/admin/books.php'
            ],
            [
             'pozadina' => 'bg-primary',
             'ikona' => '<i class="fas fa-language"></i>',
             'ime kategorije' => 'Jezici',
             'broj elemenata' => $countLanguages,
             'link' => 'http://localhost/Book_Library/admin/admin/bookLanguages.php'
            ],
            [
             'pozadina' => 'bg-info',
             'ikona' => '<i class="fas fa-font"></i>',
             'ime kategorije' => 'Žanrovi Knjiga',
             'broj elemenata' => $countGenres,
             'link' => 'http://localhost/Book_Library/admin/admin/bookGenres.php'
            ],
            [
             'pozadina' => 'bg-danger',
             'ikona' => '<i class="fas fa-user-tie"></i>',
             'ime kategorije' => 'Autori',
             'broj elemenata' => $countAutors,
             'link' => 'http://localhost/Book_Library/admin/admin/bookAutors.php'
            ],
            [
             'pozadina' => 'bg-secondary',
             'ikona' => '<i class="fas fa-archive"></i>',
             'ime kategorije' => 'Skladišta',
             'broj elemenata' => $countWarehouses,
             'link' => 'http://localhost/Book_Library/admin/admin/bookWarehouses.php'
            ],
            [
             'pozadina' => 'bg-primary',
             'ikona' => '<i class="fas fa-newspaper"></i>',
             'ime kategorije' => 'Vesti',
             'broj elemenata' => $countNews,
             'link' => 'http://localhost/Book_Library/admin/admin/news.php'
            ],
            [
             'pozadina' => 'bg-warning',
             'ikona' => '<i class="fas fa-comments"></i>',
             'ime kategorije' => 'Komentari',
             'broj elemenata' => $countNews,
             'link' => 'http://localhost/Book_Library/admin/admin/comments.php'
            ],
            [
             'pozadina' => 'bg-success',
             'ikona' => '<i class="fas fa-truck"></i>',
             'ime kategorije' => 'Porudžbine',
             'broj elemenata' => $countOrders,
             'link' => 'http://localhost/Book_Library/admin/admin/orders.php'
            ]
         ]; 

         return $categories;
    }
}