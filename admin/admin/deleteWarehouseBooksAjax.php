<?php 
    require '../../bootstrap.php';

    if( !$session->isLogedIn() ){
        header("Location: ../../public/login.php");
    }


    if($_POST){

        $bookId = trim($_POST['bookId']);
        $warehouseId = trim($_POST['warehouseId']);
        $numberOfBookCopiesKey = trim($_POST['arrayKeyNumberOfCopies']);

        if($warehouse->deleteBooksFromWarehouse( $bookId,$warehouseId,$numberOfBookCopiesKey )){

            echo "Knjige su obrisane iz skladišta";
        
        }else{
            echo "Greška nastala prilikom brisanja iz srednje tabele";
        }
    }
    


    