<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);

    include("../db.php");

    /**
     * Function for yearly users
     *
     * @param integer $year
     * @return integer $yearuser
     */

    function yearUser($year) {
        global $conn;
        $sql = "SELECT * FROM lists WHERE MONTH(created_date) = $year";

        $results = mysqli_query($conn , $sql);
        $lists = mysqli_fetch_all($results , MYSQLI_ASSOC);

        $yearUser = count($lists);
        return $yearUser;
    }
    $januaryUser = yearUser(1); 
    $februaryUser = yearUser(2);
    $marchUser = yearUser(3); 
    $aprilUser = yearUser(4); 
    $mayUser = yearUser(5); 
    $juneUser = yearUser(6); 
    $julyUser = yearUser(7); 
    $augustUser = yearUser(8); 
    $septemberUser = yearUser(9); 
    $octoberUser = yearUser(10); 
    $novemberUser = yearUser(11); 
    $decemberUser = yearUser(12); 

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
        <a href="_yearly.php" class="btn graph-btn active">Yearly</a>
        <a href="_monthly.php" class="btn graph-btn">Monthly</a>
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
                { year: 'January', count: <?php echo $januaryUser; ?> },
                { year: 'February', count: <?php echo $februaryUser; ?> },
                { year: 'March', count: <?php echo $marchUser; ?> },
                { year: 'April', count: <?php echo $aprilUser; ?> },
                { year: 'May', count: <?php echo $mayUser; ?> },
                { year: 'June', count: <?php echo $juneUser; ?> },
                { year: 'July', count: <?php echo $julyUser; ?> },
                { year: 'August', count: <?php echo $augustUser; ?> },
                { year: 'September', count: <?php echo $septemberUser; ?> },
                { year: 'October', count: <?php echo $octoberUser; ?> },
                { year: 'November', count: <?php echo $novemberUser; ?> },
                { year: 'December', count: <?php echo $decemberUser; ?> },
            ];

            new Chart(
                document.getElementById('acquisitions'),
                {
                type: 'bar',
                data: {
                    labels: data.map(row => row.year),
                    datasets: [
                    {
                        label: 'Yearly Created Post',
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