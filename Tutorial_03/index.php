<?php
    if(isset($_POST['submit'])) {
        $dob = $_POST['dob'];
        $tdyDate = date('Y-m-d');
        if ($dob > date('Y-m-d')) {
            echo "The date isn't even arrive yet";
        }else {
            $userAge = date_diff($dob , $tdyDate);
            echo $dob . "<br/>";
            echo $tdyDate . "<br/>";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Age Caculator</title>
</head>
<body>
    <div class='center-div'>
        <h1 class='result'>Your age is 23years 9months and 11days</h1>
        <div class="caculator">
            <h1 class="title">Age Caculator</h1>
            <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">
                <input type="submit" name="submit" value="Caculate" class="caculate"> 
            </form>
        <div>
    </div>
</body>
</html>
