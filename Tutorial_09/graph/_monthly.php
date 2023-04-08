<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);
    include("../db.php");

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
        $sql = "SELECT * FROM lists WHERE DATE(created_date) = $month";

        $results = mysqli_query($conn , $sql);
        $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);
        $user = count($lists);

        return $user;
    }

    $monthlyUser = monthlyUser("2023-4-8");
    echo $monthlyUser;
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (async function() {
            const data = [
                { week: '<?php echo $datesOfMonth[0];?>', count: <?php echo $monthlyUser; ?> },
                { week: '<?php echo $datesOfMonth[1];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[2];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[3];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[4];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[5];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[6];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[7];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[8];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[9];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[10];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[11];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[12];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[13];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[14];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[15];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[16];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[17];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[18];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[19];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[20];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[21];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[22];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[23];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[24];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[25];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[26];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[27];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[28];?>', count: 10 },
                { week: '<?php echo $datesOfMonth[29];?>', count: 10 },
                
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