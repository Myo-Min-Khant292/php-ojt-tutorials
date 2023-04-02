<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
 
    // error_reporting(E_ALL ^ E_DEPRECATED);

    include('upload.php');
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
    <title>Document</title>
</head>
<body>
    <div class="test">
        <?php echo $errorBox; ?>
        <?php echo $success; ?>

        <div class="img-form">
            <h1>Upload Image</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 adj">
                    <label for="formFile" class="form-label">Folder Name</label>
                    <input class="form-control <?php echo $redBorder ?>" type="text" id="formFile" name="folder_name">
                    <?php echo $folderError; ?>
                </div>
                <div class="mb-3 adj">
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control <?php echo $redBorder ?>" type="file" id="formFile" name="image">
                    <?php echo $imgError ?>
                </div>
                <input type="submit" name="submit" class="btn">
            </form>
        </div>
    </div>

    <div class="container test2">
        <div class="row justify-content-evenly gx-3">
            <div class="col-4">
                <div class="img-display-box">
                </div> 
            </div>
            <div class="col-4">
                <div class="img-display-box">
                </div> 
            </div>
            <div class="col-4">
                <div class="img-display-box">
                </div> 
            </div>
            <div class="col-4">
                <div class="img-display-box">
                </div> 
            </div>
            <div class="col-4">
                <div class="img-display-box">
                </div> 
            </div>
            <div class="col-4">
                <div class="img-display-box">
                </div> 
            </div>
            
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>