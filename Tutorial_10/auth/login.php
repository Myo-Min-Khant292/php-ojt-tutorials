<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");

    $sql = "SELECT * FROM users;";

    $results = mysqli_query($conn , $sql);
    $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);

    if(isset($_POST['login'])) {
        $validation = new LoginValidator($_POST);
        $errors= $validation->validateform();

        if(empty($errors)) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            header('Location: ../index.php');
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
    <title>Login</title>
</head>
<body>

    <div class="test2">
        <h1>Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="mb-3 adj">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control <?php echo $redborder ?>" id="email" placeholder="name@example.com">
                <p class="error"><?php echo $errors['email'] ?? "";?></p>
            </div>
            <div class="mb-3 adj">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control <?php echo $redborder ?>" id="password" placeholder="password">
                <a href="forget_password.php" class="forget">Forget Password?</a>
                <p class="error"><?php echo $errors['password'] ?? "";?></p>
            </div>
            <div class="mb-3 adj">
                <input type="submit" name="login" class="btn btn-primary register" value="Login">
                <p class="sign-up">Not a member <a href="register.php">Sign Up?</a> </p>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>