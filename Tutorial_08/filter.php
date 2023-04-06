if (empty($_POST['title']) && empty($_POST['content'])) {
    $redtBorder = 'error2';
    $redbBorder = 'error2';
    $titleError = "<p class='error'>Title field is required</p>";
    $contentError = "<p class='error'>Content field is required</p>";
}elseif (empty($_POST['title'])) {
    $redtBorder = 'error2';
    $titleError = "<p class='error'>Title field is required</p>";
}elseif (empty($_POST['content'])) {
    $redbBorder = 'error2';
    $contentError = "<p class='error'>Content field is required</p>";
}else {
    $title = mysqli_real_escape_string($conn , $_POST['title']);
    $content = mysqli_real_escape_string($conn , $_POST['content']);
    if (empty($_POST['publish'])) {
        $publish = mysqli_real_escape_string($conn , 'Unpublished');
    }else {
        $publish = mysqli_real_escape_string($conn , 'Published');
    }
    
    // Update sql
    $updateSql = "UPDATE lists SET title = '$title' , content = '$content' , published = '$publish' WHERE id = $id";

    // save to database and check
    if(mysqli_query($conn , $updateSql)) {
        //success
        header('Location: index.php');
    }else {
        //error
        echo 'query error' . mysqli_error($conn);
    }
}