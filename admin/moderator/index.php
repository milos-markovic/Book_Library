<?php
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }

    
    $categories = $statistic->get_number_of_elements_per_section();




    require 'view/index.view.php';