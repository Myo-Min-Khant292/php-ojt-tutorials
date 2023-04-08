<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);

    include("../db.php");

    $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    /**
     * Function for weekly users
     *
     * @param integer $week
     * @return integer $user
     */

    function weeklyUser($week) {
        global $conn;
        $sql = "SELECT * FROM lists WHERE DAYOFWEEK(created_date) = $week";

        $results = mysqli_query($conn , $sql);
        $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);
        $user = count($lists);

        return $user;
    }

    $MondayUser = weeklyUser(1);
    $TuesdayUser = weeklyUser(2);
    $WednesdayUser = weeklyUser(3);
    $ThursdayUser = weeklyUser(4);
    $FridayUser = weeklyUser(5);
    $SaturdayUser = weeklyUser(6);
    $SundayUser = weeklyUser(7);
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
    <title>Lists</title>
</head>
<body>
    <div class="for-btn">
        <a href="../index.php" class="btn btn-secondary">Back</a>
        <a href="_yearly.php" class="btn graph-btn">Yearly</a>
        <a href="_monthly.php" class="btn graph-btn">Monthly</a>
        <a href="_weekly.php" class="btn graph-btn active">Weekly</a>
    </div>

    <div class="graph-box">
        <canvas id="acquisitions"></canvas>
    </div>

    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (async function() {
            const data = [
                { week: '<?php echo $daysOfWeek[1];?>', count: <?php echo $MondayUser;?> },
                { week: '<?php echo $daysOfWeek[2];?>', count: <?php echo $TuesdayUser;?> },
                { week: '<?php echo $daysOfWeek[3];?>', count: <?php echo $WednesdayUser;?>},
                { week: '<?php echo $daysOfWeek[4];?>', count: <?php echo $ThursdayUser;?> },
                { week: '<?php echo $daysOfWeek[5];?>', count: <?php echo $FridayUser;?> },
                { week: '<?php echo $daysOfWeek[6];?>', count: <?php echo $SaturdayUser;?> },
                { week: '<?php echo $daysOfWeek[0];?>', count: <?php echo $SundayUser;?> },
            ];

            new Chart(
                document.getElementById('acquisitions'),
                {
                type: 'bar',
                data: {
                    labels: data.map(row => row.week),
                    datasets: [
                    {
                        label: 'Weekly Created Post',
                        data: data.map(row => row.count)
                    }
                    ]
                }
                }
            );
        })();
    </script>  
    
</body>
</html>