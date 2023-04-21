<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");

    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../libs/PHPMailer/src/Exception.php';
    require '../libs/PHPMailer/src/PHPMailer.php';
    require '../libs/PHPMailer/src/SMTP.php';

    // echo $address."</br>";
    $emailError = "";
    
    if(isset($_POST['send'])) {
        $sql = "SELECT email from users";
        $result = mysqli_query($conn , $sql);
        $users = mysqli_fetch_all($result , MYSQLI_ASSOC);
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $found = false;
        
        foreach($users as $user) {
            if($user['email'] == $email) {
                $found = true;
                break;
            }
        }
        $host = $_SERVER['HTTP_HOST']."</br>";
        $oldaddress = $_SERVER['PHP_SELF'];
        $address = str_replace("/forget_password.php" , "" , $oldaddress);

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        
        $mail->Username='myominkhant1287@gmail.com';
        $mail->Password='rdmfffxdawugceah';

        
        $mail->setFrom('myominkhant1287@gmail.com', 'Password Reset');
        // get email from input
        $mail->addAddress($email);

        
        $mail->isHTML(true);
        $mail->Subject="Recover your password";
        $mail->Body="<b>Dear User</b>
             <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://$host$address/reset_password.php?id=$email
            <br><br>
            <p>With regrads,</p>
            <b>Myo Min Khant</b>";
    
        if($found) {
            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                header("Location: ../index.php");
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
    <title>Forget Password</title>
</head>
<body>

    <div class="test2">
        <h1>Forget Password</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="mb-3 adj">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <p class="error"><?php echo $emailError?></p>
            </div>
            <div class="btn-box">
                <div class="adj">
                    <a href="login.php" class="">Login</a>
                    <input type="submit" name="send" class="btn btn-primary right" value="Send">
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>