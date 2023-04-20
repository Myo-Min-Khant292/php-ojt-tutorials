<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("db.php");

    $titleError = $contentError = "";

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn , $_GET['id']);
    }

    if(isset($id)) {
        // make sql
        $sql = "SELECT id , title , content , published , update_date FROM lists WHERE id = $id";
    
        // get the query result 
        $result = mysqli_query($conn , $sql);
    
        // fetch result in array format
        $list = mysqli_fetch_assoc($result);
        $displayTitle = $list['title'];
        $displayContent = $list['content'];
        $displayPublish = $list['published'];
        $fetchId = $list['id'];
    }

    if(isset($_POST['update'])) {
        $fetch = mysqli_real_escape_string($conn , $_POST['fetchId']);
        $title = mysqli_real_escape_string($conn , $_POST['title']);
        $rawContent = mysqli_real_escape_string($conn , $_POST['content']);
        $content = trim($rawContent);
        if (empty($_POST['publish'])) {
            $publish = mysqli_real_escape_string($conn , 'Unpublished');
        }else {
            $publish = mysqli_real_escape_string($conn , 'Published');
        }
        
        if (empty($title) && empty($content)) {
            header("Location:edit.php?id=$fetch");
            $redtBorder = 'error2';
            $redbBorder = 'error2';
            $titleError = "Title field is required";
            $contentError = "Content field is required";
            $displayTitle = "";
            $displayContent = "";
        }elseif (empty($title)) {
            header("Location:edit.php?id=$fetch");
            $redtBorder = 'error2';
            $titleError = "Title field is required";
            $displayTitle = "";
            $displayContent = $content;
            
        }elseif (empty($content)) {
            header("Location:edit.php?id=$fetch");
            $redbBorder = 'error2';
            $contentError = "Content field is required";
            $displayContent = "";
            $displayTitle =  $title;
        }else {
            // Update sql
            $updateSql = "UPDATE lists SET title = '$title' , content = '$content' , published = '$publish' WHERE id = $fetch";
        
            // save to database and check
            if(mysqli_query($conn , $updateSql)) {
                //success
                header('Location: index.php');
            }else {
                //error
                echo 'query error' . mysqli_error($conn);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Update</title>
</head>
<body>

    <div class="container test2">
        <div class="row justify-content-evenly gx-3">
            <h1>Edit Post</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'].'?id=' . $id ;?>" method="post">
                <div class="mb-3 adj">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control <?php echo $redtBorder;?>" id="exampleFormControlInput1" value="<?php echo $displayTitle; ?>">
                    <input type="hidden" name="fetchId" class="form-control <?php echo $redtBorder;?>" id="exampleFormControlInput1" value="<?php echo $fetchId; ?>">
                    <p class='error'><?php echo $titleError; ?></p>
                </div>
                <div class="mb-3 adj">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea class="form-control <?php echo $redbBorder;?>" name="content" id="exampleFormControlTextarea1" rows="3">
                        <?php echo $displayContent;?>
                    </textarea>
                    <p class='error'><?php echo $contentError; ?></p>
                </div>
                <div class="mb-3 form-check adj">
                    <input type="checkbox" name="publish" class="form-check-input" id="exampleCheck1" <?php if($displayPublish == 'Published') echo 'checked'; ?>>
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                </div>
                <div class="mb-3 adj">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                    <input type="submit" name="update"  class="btn btn-primary right" value="Update">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>