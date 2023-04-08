<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    
    $test = count($lists);

    function generateRandomTitle() {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        
        $function = substr(str_shuffle($characters) , 0 , 10);
        $randomTitle = ucfirst($function);
        return $randomTitle."</br>";
    }

    function generateRandomContent() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $RandomContent = '';
        for ($i = 0; $i < 200; $i++) {
          $randomIndex = rand(0, strlen($characters) - 1);
          $RandomContent .= $characters[$randomIndex];
        }
        return $RandomContent."</br>"; 
    }
    
    for($test ; $test <= 100 ; $test++) {
        $title = generateRandomTitle();
        $content = generateRandomContent();
        $publish = 'Published';

        $randomItemSql = "INSERT INTO lists(title, content, published) VALUES('$title', '$content' , '$publish')";

        if(mysqli_query($conn , $randomItemSql)) {
            //success
            echo "Create Successfully";
        }else {
            //error
            echo 'query error' . mysqli_error($conn);
        }
    }

    
?>