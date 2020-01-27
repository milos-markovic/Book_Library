<?php
    require 'config.php';

    // require 'Class/Session.php';
    // require 'Class/Database.php';
    // require 'Class/Query.php';
    // require 'Class/Validation.php';
    // require 'Class/User.php';
    // require 'Class/BookGenre.php';
    // require 'Class/BookLanguage.php';
    // require 'Class/BookAutor.php';
    // require 'Class/BookWarehouse.php';
    // require 'Class/Book.php';
    // require 'Class/News.php';
    // require 'Class/BookComments.php';
    // require 'Class/CommentReplies.php';
    // require 'Class/Statistic.php';
    // require 'Class/BookOrders.php';
    // require_once 'Class/Menu.php';

    spl_autoload_register(function ($class_name) {
        require 'Class/'. $class_name . '.php';
    });
    
    require 'include/functions.php';

    $database = new Database();
    $query = new Query($database->db);
    $validate = new Validation($query);
    $session = new Session($query);
    $user = new User($query);
    $genre = new BookGenre($query);
    $language = new BookLanguage($query);
    $autor = new BookAutor($query);
    $warehouse = new BookWarehouse($query);
    $book = new Book($query);
    $news = new News($query);
    $comment = new BookComments($query);
    $commentReply = new CommentReplies($query);
    $order = new BookOrders($query);
    $menu = new Menu($query);
    $statistic = new Statistic();

    