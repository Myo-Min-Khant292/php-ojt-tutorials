<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("db.php");
    session_start();

    $email = $_SESSION['email'] ?? "";
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $results = mysqli_query($conn , $sql);
    $users = mysqli_fetch_all($results , MYSQLI_ASSOC);

    $imgsql = "SELECT image FROM users WHERE email = '$email'";
    $img = mysqli_query($conn , $imgsql);
    $imgUser = mysqli_fetch_assoc($img);
    print_r($imgUser);
    $_SESSION['image'] = $imgUser["image"] ?? "default_img.png";

    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
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
    <title>Index</title>
</head>
<body>
    <header class="header">
        <div class="adj clearfix">
            <h4 class="left">Home</h4>
            <div class="right">
                <?php if(isset($_SESSION['email'])) : ?>
                    <div class="user_email">
                        <img src="images/<?php echo $_SESSION['image']?>" class="user_img2">
                        <ul class="list-group detail">
                            <li class="list-group-item">
                                <a href="auth/profile.php?id=<?php echo $users[0]['id']; ?>" class="">Profile</a>
                            </li>
                            <li class="list-group-item">
                                <form action ="index.php" method="post">
                                    <input type="submit" name="logout" class="" value="logout"></input>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php else : ?>
                    <a href="auth/login.php" class="btn btn-primary">Login</a>
                    <a href="auth/register.php" class="btn btn-primary">Register</a>
                <?php endif ?>
            </div>
        </div>
    </header>

    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>