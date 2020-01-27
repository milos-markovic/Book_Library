<?php
    require '../bootstrap.php';

    $getNews = $news->getAllNews();

  

    require 'view/news.view.php';