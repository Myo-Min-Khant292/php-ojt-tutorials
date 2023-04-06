<?php
    include("db.php");

    $id = $_GET["id"];

    // write query to delete item with specified ID
    $sql = "DELETE FROM lists WHERE id = $id";
    
    // run query
    mysqli_query($conn, $sql);

    // close connection
    mysqli_close($conn);

    // redirect back to the list page
    header("Location: index.php");
?>