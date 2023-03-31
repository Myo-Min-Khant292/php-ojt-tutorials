<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    error_reporting(E_ALL ^ E_DEPRECATED);

    require('libs/spreadsheet/vendor/autoload.php');
    require ('libs/phpword/vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\IOFactory as SpreadsheetIOFactory;
    use PhpOffice\PhpWord\IOFactory as WordIOFactory;

    $txtFile = 'files/sample.txt';

    $docReader = WordIOFactory::createReader('Msdoc');
    $docFile = $docReader->load('files/sample.doc');
    $sections = $docFile->getSections();

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
                    // Get all elements of the section
                    $elements = $section->getElements();
                    // Loop through all elements of the section
                    foreach ($elements as $element) {
                        // Check the type of the element
                        if ($element instanceof PhpOffice\PhpWord\Element\Text) {
                            // If it's a text element, echo its text content
                            echo $element->getText();
                        } elseif ($element instanceof PhpOffice\PhpWord\Element\Table) {
                            // If it's a table element, echo its table data
                            $rows = $element->getRows();
                            foreach ($rows as $row) {
                                $cells = $row->getCells();
                                foreach ($cells as $cell) {
                                    echo $cell->getText() . "\t";
                                }
                                echo "\n";
                            }
                        }
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
