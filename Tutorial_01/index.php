<?php

function drawChessBorad($rows, $cols)
{
    if ($rows <= 0 || $cols <= 0) {
        if ($rows <= 0 && $cols <= 0) {
            echo '<p class="error-message">$rows and $cols must be greater than zero</p>';
        } elseif ($rows <= 0) {
            echo '<p class="error-message">$rows must be greater than zero</p>';
        } elseif ($cols <= 0) {
            echo '<p class="error-message">$cols must be greater than zero</p>';
        }
    } elseif (!is_numeric($rows) || !is_numeric($cols)) {
        if (!is_numeric($rows) && !is_numeric($cols)) {
            echo '<p class="error-message">$rows and $cols must be numbers</p>';
        } elseif (!is_numeric($rows)) {
            echo '<p class="error-message">$rows must be a number</p>';
        } elseif (!is_numeric($cols)) {
            echo '<p class="error-message">$cols must be a number</p>';
        } elseif ($rows <= 0 && !is_numeric($cols)) {
            echo '<p class="error-message">$rows parameter must be greater than 0. $cols parameter must be a number.</p>';
        } elseif (!is_numeric($rows) && $cols <= 0) {
            echo '<p class="error-message">$rows parameter must be a number. $cols parameter must be greater than 0</p>';
        }
    }else {
        for ($i = 1; $i <= $rows; $i++) {
            echo '<tr class="row">';
            for ($j = 1; $j <= $cols; $j++) {
                if (($i + $j) % 2 == 0) {
                    echo '<td class="col color1"></td>';
                } else {
                    echo '<td class="col color2"></td>';
                }
            }
            echo '</tr>';
        }
    }
}

// drawChessBorad(8, 8); // output => 8 rows and 8 columns chess borad.
// drawChessBorad(5, 2); // output => 5 rows and 2 columns chess borad.
// drawChessBorad(0, 1); // output => $rows parameter must be greater than 0.
// drawChessBorad(1, 0); // output => $cols parameter must be greater than 0.
// drawChessBorad(0, 0); // output => $rows and $cols parameters must be greater than 0.
// drawChessBorad('myrow', 'mycols'); // output => $rows and $cols parameters must be number.
// drawChessBorad('myrow', 5); // output => $rows parameter must be number.
// drawChessBorad(5, 'mycols'); // output => $cols parameter must be number.
// drawChessBorad(0, 'mycols'); // output => $rows parameter must be greater than 0.$cols parameter must be number.
// drawChessBorad('myrow', 0); // output => $rows parameter must be number.$cols parameter must be greater than 0.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ChessBoard</title>
</head>
<body>
    <div class="mid-container">
        <h1>Chessboard</h1>
        <table class="chess">
            <?php drawChessBorad(8 , 8); ?>
        <table>
    </div>
</body>
</html>

