<?php  
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");

    if(isset($_POST['register'])) {
        
        // check errors 
        $validation = new UserValidator($_POST);
        $errors= $validation->validateform();
        if(empty($errors)) {
            $userName = mysqli_real_escape_string($conn , $_POST['username']);
            $hashPwd = password_hash($_POST['password'] , PASSWORD_DEFAULT);
            $email = mysqli_real_escape_string($conn , $_POST['email']);
            $phone = mysqli_real_escape_string($conn , $_POST['phone']);
            $address = mysqli_real_escape_string($conn , $_POST['address']);

            $sql = "INSERT INTO users(name, email, password , phone , address) VALUES('$userName', '$email' , '$hashPwd' , '$phone' , '$address')";

            // save to database and check
            if(mysqli_query($conn , $sql)) {
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
    <title>Register</title>
</head>
<body>

    <div class="test2">
        <h1>Register</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="mb-3 adj">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="username" class="form-control" id="name" placeholder="<?php echo $_POST['username']??'name';?>">
                <p class="error"><?php echo $errors['username'] ?? "";?></p>
            </div>
            <div class="mb-3 adj">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="<?php echo $_POST['email']??'name@example.com';?>">
                <p class="error"><?php echo $errors['email'] ?? "";?></p>
            </div>
            <div class="mb-3 adj">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control" id="phone" placeholder="<?php echo $_POST['phone']??'09********';?>">
                <p class="error"><?php echo $errors['phone'] ?? "";?></p>
            </div>
            <div class="mb-3 adj">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="<?php echo $_POST['password']??'password';?>">
                <p class="error"><?php echo $errors['password'] ?? "";?></p>
            </div>
            <div class="mb-3 adj">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="<?php echo $_POST['address']??'';?>">
                <p class="error"><?php echo $errors['address'] ?? "";?></p>
            </div>
            <div class="mb-3 adj">
                <input type="submit" name="register" class="btn btn-primary register" value="Register">
                <a href="login.php" class="login-link">Already have an account?</a>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>