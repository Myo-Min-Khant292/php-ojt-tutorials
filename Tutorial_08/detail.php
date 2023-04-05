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
            <h1>Post Detail</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="mb-3 adj">
                    <input type="submit" name="back" class="btn btn-secondary" value="Back">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>