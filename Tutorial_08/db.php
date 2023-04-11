<?php
    // connect to db
    $conn = mysqli_connect("localhost" , "root" , "1234" , "post_lists");

    if(!$conn) {
       echo 'Connection failed' . mysqli_connect_error();
    }else {
        // echo "database connect successfully"."</br>";
    }

    //create table with boolean column
    // $sql = "CREATE TABLE lists (
    //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     title VARCHAR(255) NOT NULL,
    //     content TEXT NOT NULL,
    //     published VARCHAR(50),
    //     created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    //     update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";

    // if (mysqli_query($conn, $sql)) {
    //     echo "Table created successfully";
    // } else {
    //     echo "Table already created";
    // }
?>