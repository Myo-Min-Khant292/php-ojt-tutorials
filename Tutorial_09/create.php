<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);

    include("db.php");
    $titleError = $contentError = "";

    if(isset($_POST['create'])) {
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
            
            // Create sql
            $sql = "INSERT INTO lists(title, content, published) VALUES('$title', '$content' , '$publish')";

            // save to database and check
            if(mysqli_query($conn , $sql)) {
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
    <title>Create</title>
</head>
<body>

    <div class="container test2">
        <div class="row justify-content-evenly gx-3">
            <h1>Create Post</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="mb-3 adj">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control <?php echo $redtborder ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                    <?php echo $titleError; ?>
                </div>
                <div class="mb-3 adj">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea class="form-control <?php echo $redbborder ?>" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <?php echo $contentError; ?>
                </div>
                <div class="mb-3 form-check adj">
                    <input type="checkbox" name="publish" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1" name="publish">Publish</label>
                </div>
                <div class="mb-3 adj">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                    <input type="submit" name="create" class="btn btn-primary right" value="Create">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>