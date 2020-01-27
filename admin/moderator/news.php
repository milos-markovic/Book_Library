<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

   
    

    $getNews = $news->getAllNews();
   

    include 'view/news.view.php';