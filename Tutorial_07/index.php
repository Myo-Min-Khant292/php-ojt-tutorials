<?php
    include('generate.php');
    $folderDir = "images/";
    $folderFiles = scandir($folderDir); 
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
    <title>QR generator</title>
</head>
<body>
    <div class="test">
        <div class="img-form">
            <h2>QR Code Generator</h2>
            <?php echo $success; ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 adj">
                    <label for="formFile" class="form-label">QR Name</label>
                    <input class="form-control <?php echo $redBorder ?>" type="text" id="formFile" name="QR_name">
                    <?php echo $qrError; ?>
                </div>
                <input type="submit" name="submit" class="btn">
            </form>
        </div>
    </div>

    <?php echo '<img src="'.$urlRelativeFilePath.'" class="'.$imageStyle.'" />' ?>

    <div class="container test2">
        <div class="row justify-content-evenly gx-3">
            <h1>QR.Lists</h1>
                <?php foreach($folderFiles as $folderFile) : ?>
                    <?php
                        if($folderFile == '.') {
                            continue;
                        }
                        if ($folderFile == '..') {
                            continue;
                        }
                    ?>
                    <div class="col-4">
                        <div class="img-display-box">
                            <img class="img" src="images/<?php echo $folderFile?>" alt="<?php echo $folderFile?>"></img>
                            <p class="img-name"><?php echo $folderFile ?></p>
                        </div> 
                    </div>
                <?php endforeach ?>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>