<?php
    include('upload.php');

    $folderDir = "images/";
    $folderFiles = scandir($folderDir);
    $folderPath = $_GET['id'];
    unlink($folderPath);
    
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
    <title>Image Upload and Generate</title>
</head>
<body>
    <div class="test">
        <?php echo $success; ?>
        
        <div class="img-form">
            <h1>Upload Image</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3 adj">
                    <label for="formFile" class="form-label">Folder Name</label>
                    <input class="form-control <?php echo $redtBorder ?>" type="text" id="formFile" name="folder_name">
                    <?php echo $folderError; ?>
                </div>
                <div class="mb-3 adj">
                    <label for="formFile" class="form-label">Choose Image</label>
                    <input class="form-control <?php echo $redbBorder ?>" type="file" id="formFile" name="image">
                    <?php echo $imgError ?>
                </div>
                <input type="submit" name="submit" class="btn">
            </form>
        </div>
    </div>

    <div class="container test2">
        <div class="row justify-content-evenly gx-3">
            <?php foreach($folderFiles as $folderFile) : ?>
                <?php
                    if($folderFile == '.') {
                        continue;
                    }
                    if ($folderFile == '..') {
                        continue;
                    }
                    $imageDir = "images/$folderFile";
                    $imageFiles = scandir($imageDir);
                ?>
                <?php foreach($imageFiles as $imageFile) : ?>
                            <?php
                                if($imageFile == '.') {
                                    continue;
                                }
                                if ($imageFile == '..') {
                                    continue;
                                }
                                $folderPath = "images/$folderFile/$imageFile";
                            ?>
                            <div class="col-4">
                                <div class="img-display-box">
                                    <img class="img" src="images/<?php echo $folderFile."/".$imageFile?>" alt="<?php echo $imageFile?>"></img>
                                    <p class="img-name"><?php echo $imageFile ?></p>
                                    <p><?php echo $_SERVER['HTTP_HOST'] . "/php-ojt-tutorials/Tutorial_06/images/$folderFile/$imageFile";?></p>
                                    <a href="index.php?id=<?php echo $folderPath?>" class="destory">Delete</a>
                                </div> 
                            </div>     
                <?php endforeach ?>
                
            <?php endforeach ?>  
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>