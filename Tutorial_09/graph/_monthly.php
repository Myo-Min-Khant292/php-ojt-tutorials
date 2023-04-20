<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");

    $year = date('Y');
    $month = date('m');
    $num_days = date('t', strtotime("$year-$month-01"));
    $dates = [];
    for($day = 1; $day <= $num_days; $day++){
        array_push($dates , date("$year-$month-$day"));
    }
    // foreach($dates as $date){
    //     echo $date . "<br>";
    // }
    echo $dates[1]."<br/>";
    /**
     * Function for monthly users
     *
     * @param integer $week
     * @return integer $user
     */

    function monthlyUser($month) {
        global $conn;
        $sql = "SELECT * FROM lists WHERE DATE_FORMAT(created_date, '%Y-%m-%d') = '$month'";

        $results = mysqli_query($conn , $sql);
        $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);
        $user = count($lists);

        return $user;
    }

    $test = monthlyUser($dates[9]);
    echo $test;
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
        <a href="_monthly.php" class="btn graph-btn active">Monthly</a>
        <a href="_weekly.php" class="btn graph-btn">Weekly</a>
    </div>

    <div class="graph-box">
        <canvas id="acquisitions"></canvas>
    </div>

    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../libs/chart.js/dist/chart.umd.js"></script>
    <script>
        (async function() {
            const data = [
                <?php for ($i = 0 ; $i < $num_days ; $i++): ?>  
                    { week: '<?php echo $dates[$i];?>', count: <?php echo monthlyUser($dates[$i]); ?> },
                <?php endfor; ?>
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