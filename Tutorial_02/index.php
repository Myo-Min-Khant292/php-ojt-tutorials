<?php
    /**
     * creating diamond shape pattern
     * 
     * @param integer $row
    */
    function makeDiamondShape($row)
    {
        if ($row <= 0 ) {
            echo '<p class="error-message">$row must be greater than zero</p>';
        } elseif (!is_numeric($row)) {
            echo '<p class="error-message">$rows must be a number</p>';
        } elseif ($row % 2 == 0) {
            echo '<p class="error-message">$row must be odd number.</p>';
        }else {
            for ($i = 0; $i < $row; $i++) {
                $numSpaces = abs($row - 2 * $i - 1) / 2;
                $numStars = $row - $numSpaces * 2;
                
                for ($j = 0; $j < $numSpaces; $j++) {
                    echo "&nbsp ";
                }
                for ($j = 0; $j < $numStars; $j++) {
                    echo "*";
                }
                echo "<br/>";
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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Diamond</title>
</head>
<body>
    <h1>Diamond</h1>
    <div class="mid-container">
        <div class="diamond">
            <?php makeDiamondShape(13); ?>
        </div>
    </div>
</body>
</html>