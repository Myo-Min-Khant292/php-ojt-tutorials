<?php
    require('libs/spreadsheet/vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $txtFile = 'files/sample.txt';
    $convertXlsxFile = 'files/sample.xlsx';

    $xlsxFile = \PhpOffice\PhpSpreadsheet\IOFactory::load($convertXlsxFile);
   
    // $csvFile = 'files/sample.csv';
    // $docFile = 'files/sample.doc';

    // $open = readfile($csvFile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>File Reader</title>
</head>
<body>
    <div class='center-div'>
        <h1>Text File</h1>
        <pre><?php readfile($txtFile); ?> </pre>
        <h1>Document File</h1>
        <?php echo $xlsxFile; ?>
    </div>
</body>
</html>
