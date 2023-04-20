<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    
    $test = count($lists);

    /**
     * Function for generate title
     *
     * 
     * @return string $randomTitle
     */

    function generateRandomTitle() {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        
        $function = substr(str_shuffle($characters) , 0 , 10);
        $randomTitle = ucfirst($function);
        return $randomTitle."</br>";
    }

    /**
     * Function for generate content
     *
     * 
     * @return string $randomcontent
     */

    function generateRandomContent() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $RandomContent = '';
        for ($i = 0; $i < 200; $i++) {
          $randomIndex = rand(0, strlen($characters) - 1);
          $RandomContent .= $characters[$randomIndex];
        }
        return $RandomContent; 
    }

    /**
     * Function for generate datetime
     *
     * 
     * @return string $storeTimeStamp
     */

    function generateRandomDateTime() {
        $startDate = strtotime("2023-01-01");
        $endDate = strtotime("2023-12-31");

        $randomTimeStamp = rand($startDate, $endDate);
        $storeTimeStamp = date("Y-m-d H:i:s", $randomTimeStamp);
        return $storeTimeStamp;
    }
    
    for($test ; $test <= 100 ; $test++) {
        $title = generateRandomTitle();
        $content = generateRandomContent();
        $publish = 'Published';
        $time = generateRandomDateTime();

        $randomItemSql = "INSERT INTO lists(title, content, published , created_date) VALUES('$title', '$content' , '$publish' , '$time')";

        if(mysqli_query($conn , $randomItemSql)) {
            //success
            
        }else {
            //error
            echo 'query error' . mysqli_error($conn);
        }
    }

    
?>