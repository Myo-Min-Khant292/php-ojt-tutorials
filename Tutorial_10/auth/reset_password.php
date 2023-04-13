<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");
    session_start();

    $email = $_SESSION['email'];

    $emailError = $pwdError = $confirmPwdError = "";
    $sql = "SELECT email , password from users";
    $result = mysqli_query($conn , $sql);
    $users = mysqli_fetch_all($result , MYSQLI_ASSOC);

    if(isset($_POST['confirm'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmpassword'];
        $found = false;

        foreach($users as $user) {
            if($user['email'] == $email) {
                $found = true;
                break;
            }
        }

        if($found) {
            $pwd = trim($password);
            $confirmPwd = trim($confirmPassword);
            if (empty($pwd) && empty($confirmPwd)) {
                $pwdError = "Password Field is required";
                $confirmPwdError = "Confirm Password field is required"; 
            }elseif (empty($pwd)) {
                $pwdError = "Password Field is required";
            }elseif (empty($confirmPwd)) {
                $confirmPwdError = "Confirm Password field is required";
            }else {
                $hashPwd = password_hash($password , PASSWORD_DEFAULT);
                $updateSql = "UPDATE users SET password = '$hashPwd' WHERE email = '$email'";
        
                // save to database and check
                if(mysqli_query($conn , $updateSql)) {
                    //success
                    header('Location: ../index.php');
                }else {
                    //error
                    echo 'query error' . mysqli_error($conn);
                }
            }
        }else {
            $emailError = "This email address did not found in database.";
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
    <title>Reset Password</title>
</head>
<body>

    <div class="test2">
        <h1>Reset Password</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="mb-3 adj">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control <?php echo $redborder ?>" id="email" value="<?php echo $email; ?>" readonly>
                <p class="error"><?php echo $emailError; ?></p>
            </div>
            <div class="mb-3 adj">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control <?php echo $redborder ?>" id="password" placeholder="password">
                <p class="error"><?php echo $pwdError; ?></p>
            </div>
            <div class="mb-3 adj">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control <?php echo $redborder ?>" id="confirmpassword" placeholder="password">
                <p class="error"><?php echo $confirmPwdError; ?></p>
            </div>
            <div class="btn-box">
                <div class="adj clearfix">
                    <input type="submit" name="confirm" class="btn btn-primary right" value="Confirm">
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>