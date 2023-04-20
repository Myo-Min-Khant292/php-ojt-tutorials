<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");

    $year = date('Y');
    $month = date('m');
    $num_days = date('t', strtotime("$year-$month-01"));
    $date = [];
    for($day = 1; $day <= $num_days; $day++){
        array_push($date , date("$year-$month-$day"));
    }
    print_r($date);
    
    $datesOfMonth = array(
        '2023-04-01', '2023-04-02', '2023-04-03', '2023-04-04', '2023-04-05',
        '2023-04-06', '2023-04-07', '2023-04-08', '2023-04-09', '2023-04-10',
        '2023-04-11', '2023-04-12', '2023-04-13', '2023-04-14', '2023-04-15',
        '2023-04-16', '2023-04-17', '2023-04-18', '2023-04-19', '2023-04-20',
        '2023-04-21', '2023-04-22', '2023-04-23', '2023-04-24', '2023-04-25',
        '2023-04-26', '2023-04-27', '2023-04-28', '2023-04-29', '2023-04-30'
    );

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

    for ($i = 1; $i <= 30; $i++) {
        ${"monthlyUser$i"} = monthlyUser("2023-04-$i");
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
                { week: '<?php echo $datesOfMonth[0];?>', count: <?php echo $monthlyUser1; ?> },
                { week: '<?php echo $datesOfMonth[1];?>', count: <?php echo $monthlyUser2; ?> },
                { week: '<?php echo $datesOfMonth[2];?>', count: <?php echo $monthlyUser3; ?> },
                { week: '<?php echo $datesOfMonth[3];?>', count: <?php echo $monthlyUser4; ?> },
                { week: '<?php echo $datesOfMonth[4];?>', count: <?php echo $monthlyUser5; ?> },
                { week: '<?php echo $datesOfMonth[5];?>', count: <?php echo $monthlyUser6; ?> },
                { week: '<?php echo $datesOfMonth[6];?>', count: <?php echo $monthlyUser7; ?> },
                { week: '<?php echo $datesOfMonth[7];?>', count: <?php echo $monthlyUser8; ?> },
                { week: '<?php echo $datesOfMonth[8];?>', count: <?php echo $monthlyUser9; ?> },
                { week: '<?php echo $datesOfMonth[9];?>', count: <?php echo $monthlyUser10; ?>},
                { week: '<?php echo $datesOfMonth[10];?>', count: <?php echo $monthlyUser11; ?>},
                { week: '<?php echo $datesOfMonth[11];?>', count: <?php echo $monthlyUser12; ?>},
                { week: '<?php echo $datesOfMonth[12];?>', count: <?php echo $monthlyUser13; ?>},
                { week: '<?php echo $datesOfMonth[13];?>', count: <?php echo $monthlyUser14; ?>},
                { week: '<?php echo $datesOfMonth[14];?>', count: <?php echo $monthlyUser15; ?>},
                { week: '<?php echo $datesOfMonth[15];?>', count: <?php echo $monthlyUser16; ?>},
                { week: '<?php echo $datesOfMonth[16];?>', count: <?php echo $monthlyUser17; ?>},
                { week: '<?php echo $datesOfMonth[17];?>', count: <?php echo $monthlyUser18; ?>},
                { week: '<?php echo $datesOfMonth[18];?>', count: <?php echo $monthlyUser19; ?>},
                { week: '<?php echo $datesOfMonth[19];?>', count: <?php echo $monthlyUser20; ?>},
                { week: '<?php echo $datesOfMonth[20];?>', count: <?php echo $monthlyUser21; ?>},
                { week: '<?php echo $datesOfMonth[21];?>', count: <?php echo $monthlyUser22; ?>},
                { week: '<?php echo $datesOfMonth[22];?>', count: <?php echo $monthlyUser23; ?>},
                { week: '<?php echo $datesOfMonth[23];?>', count: <?php echo $monthlyUser24; ?>},
                { week: '<?php echo $datesOfMonth[24];?>', count: <?php echo $monthlyUser25; ?>},
                { week: '<?php echo $datesOfMonth[25];?>', count: <?php echo $monthlyUser26; ?>},
                { week: '<?php echo $datesOfMonth[26];?>', count: <?php echo $monthlyUser27; ?>},
                { week: '<?php echo $datesOfMonth[27];?>', count: <?php echo $monthlyUser28; ?>},
                { week: '<?php echo $datesOfMonth[28];?>', count: <?php echo $monthlyUser29; ?>},
                { week: '<?php echo $datesOfMonth[29];?>', count: <?php echo $monthlyUser30; ?>},
                
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