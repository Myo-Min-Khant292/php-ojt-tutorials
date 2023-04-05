<?php  
    
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
            <h1>Edit Post</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="mb-3 adj">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3 adj">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3 form-check adj">
                    <input type="checkbox" name="publish" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                </div>
                <div class="mb-3 adj">
                    <input type="submit" name="back" class="btn btn-secondary" value="Back">
                    <input type="submit" name="create" class="btn btn-primary right" value="Create">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>