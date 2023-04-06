<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("db.php");

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn , $_GET['id']);
    
        // make sql
        $sql = "SELECT id , title , content , published , update_date FROM lists WHERE id = $id";
    
        // get the query result 
        $result = mysqli_query($conn , $sql);
    
        // fetch result in array format
        $list = mysqli_fetch_assoc($result);
        $title = $list['title'];
        $content = $list['content'];

        if(isset($_POST['update'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            echo $title . "</br>";
            echo $content . "</br>";
            echo "I clicked update";
        }else {
            echo 'This is error'."</br>";
        }
    
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    // $id = mysqli_real_escape_string($conn , $_GET['id']);
    // echo $id . "</br>";
        
    // if(isset($_POST['update'])) {
    //     $title = $_POST['title'];
    //     $content = $_POST['content'];
    //     echo $title . "</br>";
    //     echo $content . "</br>";
    // }else {
    //     echo "something wrong". "</br>";
    // }

    

    
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
            <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
                <div class="mb-3 adj">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="<?php echo $title; ?>">
                </div>
                <div class="mb-3 adj">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">
                        <?php echo $content;?>
                    </textarea>
                </div>
                <div class="mb-3 form-check adj">
                    <input type="checkbox" name="publish" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                </div>
                <div class="mb-3 adj">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                    <input type="submit" name="update" class="btn btn-primary right" value="Update">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>