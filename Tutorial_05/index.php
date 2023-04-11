<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);

    require('libs/spreadsheet/vendor/autoload.php');
    require ('libs/phpword/vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\IOFactory as SpreadsheetIOFactory;
    use PhpOffice\PhpWord\IOFactory as WordIOFactory;

    $txtFile = 'files/sample.txt';

    $objReader = \PhpOffice\PhpWord\IOFactory::createReader("Msdoc");
    $phpWord = $objReader->load("files/sample.doc");
    $sections = $phpWord->getSections();

    // Save the document as HTML
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'HTML');
    

    $convertXlsxFile = 'files/sample.xlsx';
    $xlsxReader = SpreadsheetIOFactory::createReaderForFile($convertXlsxFile);
    $xlsxSpreadSheet = $xlsxReader->load($convertXlsxFile);
    $xlsxWorkSheet = $xlsxSpreadSheet->getActiveSheet();

    $convertCsvFile = 'files/sample.csv';
    $csvReader = SpreadsheetIOFactory::createReaderForFile($convertCsvFile);
    $csvSpreadSheet = $csvReader->load($convertCsvFile);
    $csvWorkSheet = $csvSpreadSheet->getActiveSheet();
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
        <div>
            <?php
                foreach ($sections as $section) {
                    $paragraphs = $section->getElements();
                    foreach ($paragraphs as $paragraph) {
                        $text = $paragraph->getText();
                        echo $text . "<br>";
                    }
                }
            ?> 
        </div>
        <h1>Excel File</h1>
        <?php
            echo '<table>';
            foreach ($xlsxWorkSheet->getRowIterator() as $row) {
                echo '<tr>';
                foreach ($row->getCellIterator() as $cell) {
                    echo '<td>' . $cell->getValue() . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        ?>
        <h1>Csv File </h1>
        <?php
            echo '<table>';
            foreach ($csvWorkSheet->getRowIterator() as $row) {
                echo '<tr>';
                foreach ($row->getCellIterator() as $cell) {
                    echo '<td>' . $cell->getValue() . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';         
        ?>
    </div>
</body>
</html>
