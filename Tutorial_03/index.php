<?php
    $userAge = '';

    if(isset($_POST['submit'])) {
        $dob = date_create($_POST['dob']);
        $tdyDate = date_create();
    
        if ($dob > $tdyDate) {
            $userAge = "<h1 class='result'>The date isn't even arrive yet</h1>"."</br>";
        }else {
            $result = date_diff($dob, $tdyDate);
            $userAge = "<h1 class='result'>" . ($result->format('%Y years %m months %d days')). "</h1>";  
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
    <title>Age Calculator</title>
</head>
<body>
    <div class='center-div'>
        <?php echo $userAge; ?></h1>
        <div class="calculator">
            <h1 class="title">Age Calculator</h1>
            <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob">
                <input type="submit" name="submit" value="Calculate" class="calculate"> 
            </form>
        <div>
    </div>
</body>
</html>
