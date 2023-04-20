<?php
    // connect to db
    $conn = mysqli_connect("localhost" , "root" , "1234" , "post_lists");

    if(!$conn) {
       echo 'Connection failed' . mysqli_connect_error();
    }

    // check if table exists
    $check_table_query = "SELECT * FROM information_schema.tables WHERE table_schema = 'post_lists' AND table_name = 'lists' LIMIT 1";
    $result = mysqli_query($conn, $check_table_query);
    $table_exists = mysqli_num_rows($result) > 0;

    //create table with boolean column
    if (!$table_exists) {
        $sql = "CREATE TABLE lists (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            published VARCHAR(50),
            created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
            update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (mysqli_query($conn, $sql)) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
     }
?>