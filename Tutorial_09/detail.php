<?php  
    include("db.php");

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn , $_GET['id']);
    
        // make sql
        $sql = "SELECT * FROM lists WHERE id = $id";
    
        // get the query result 
        $result = mysqli_query($conn , $sql);
    
        // fetch result in array format
        $list = mysqli_fetch_assoc($result);
    
        mysqli_free_result($result);
        mysqli_close($conn);
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
    <title>View</title>
</head>
<body>

    <div class="container test2">
        <div class="row justify-content-evenly gx-3">
            <h1>Post Detail</h1>
            <h2><?php echo $list['title']; ?></h2>
            <h4><?php echo "Published at " . date('Y-m-d', strtotime($list['created_date'])); ?> </h4>
            <p><?php echo $list['content']; ?></p>
        </div>
        <a href="index.php" class="detail-btn">Back</a>
    </div>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>