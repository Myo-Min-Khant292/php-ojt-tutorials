<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");
    session_start();
    $img = $_SESSION['image'] ?? "default_img.png";

    if(isset($_GET['id'])) {
        $id =  $_GET['id'];
    }

    if(isset($id)) {
        // make sql
        $sql = "SELECT id , name , email , image , update_date FROM users WHERE id = $id";
    
        // get the query result 
        $result = mysqli_query($conn , $sql);
    
        // fetch result in array format
        $user = mysqli_fetch_assoc($result);
        $displayName = $user['name'];
        $displayEmail = $user['email'];
        $fetchId = $user['id'];
    }

    $nameError = $emailError = $imgError = "";
    if(isset($_POST['update'])) {
        $fetch =  $_POST['fetchId'];
        $name =  $_POST['name'];
        $email =  $_POST['email'];
        $image = $_FILES['image']['name'];
        $tmpImage = $_FILES['image']['tmp_name'];
        $imageInput = "../images/".$image;

        if (empty($name) && empty($email)) {
            $redBorder = 'error2';
            $nameError = "Name field is required";
            $emailError = "Email field is required";
            $displayName = "";
            $displayEmail = "";
        }elseif (empty($name)) {
            $redBorder = 'error2';
            $nameError = "Name field is required";
            $displayName = "";
            $displayEmail = $email;
        }elseif (empty($email)) {
            $redBorder = 'error2';
            $emailError = "Email field is required";
            $displayName = $name;
            $displayEmail = $email;
        }elseif (file_exists($imageInput)) {
            $imgError = "You need to change image or folder name";
        }else {

            move_uploaded_file($tmpImage , $imageInput);
            // Update sql
            $updateSql = "UPDATE users SET name = '$name' , email = '$email' , image = '$image' WHERE id = $fetch";
        
            // save to database and check
            if(mysqli_query($conn , $updateSql)) {
                //success
                header('Location: ../index.php');
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
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Profile</title>
</head>
<body>

    <div class="test2">
        <h1>My Profile Setting</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="mb-3 adj clearfix">
                <input type="hidden" name="fetchId" class="form-control" id="exampleFormControlInput1" value="<?php echo $fetchId ; ?>">
                <img class="user_img" src="../images/<?php echo $img;?>">
                <input type="file" name="image" class="form-control img_upload" accept=".jpg, .jpeg, .png, image/*">
                <p class="error"><?php echo $imgError ?></p>
            </div>
            <div class="mb-3 adj">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control <?php echo $redBorder ?>" id="name" value="<?php echo $displayName; ?>">
                <p class="error"><?php echo $nameError ?></p>
            </div>
            <div class="mb-3 adj">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control <?php echo $redBorder ?>" id="email" value="<?php echo $displayEmail; ?>">
                <p class = "error"><?php echo $emailError ?></p>
            </div>
            <div class="adj fg clearfix">
                <input type="submit" name="update" class="btn btn-primary right" value="Update">
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>