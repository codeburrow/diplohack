<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

require __DIR__.'/provision.php';

$excelFileLocation = __DIR__.'/../../storage/data_set.xlsx';

$objPHPExcel = PHPExcel_IOFactory::load($excelFileLocation);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

for ($row = 2; $row <= $highestRow; $row++) {
    $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row)[0];
    
    $categoryName = $rowData[0];
    
    var_dump(trim($categoryName));exit;
}

var_dump($objPHPExcel);
exit;








