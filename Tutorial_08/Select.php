$id = mysqli_real_escape_string($conn , $_GET['id']);
    
        // make sql
        $sql = "SELECT id , title , content , published , update_date FROM lists WHERE id = $id";

        // Update sql
        $updateSql = "UPDATE lists SET title = '$title' , content = '$content' , published = '$publish' WHERE id = $id";
    
        // get the query result 
        $result = mysqli_query($conn , $sql);
    
        // fetch result in array format
        $list = mysqli_fetch_assoc($result);

    
        mysqli_free_result($result);
        mysqli_close($conn);