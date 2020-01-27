<?php

    function oldInput( $inputName ){
    
        echo isset($_POST[$inputName]) ? $_POST[$inputName] : ''; 
        
    }


    function redirect($location,$data = null){

        if($data !== null){
            header("Location: $location.php?id=$data");
            exit;

        } else{
            header("Location: $location.php");
            exit;
        }
    }

    function formatDateTime($date){
        return date('d.m. Y   H:i:s',strtotime($date));
    }
        
    function formatDate($date){
        return date('d.m.Y',strtotime($date));
    }
        
    function showMore($string){
    
        if( strlen($string) > 50) {
            $str = explode( "\n", wordwrap( $string, 50));
            $str = $str[0] . ' ...';

            return $str;
        }else{
            return $string;
        }
    
        
    }

