<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
use App\DbServices\AreaDbService;
use App\DbServices\CategoryDbService;
use App\DbServices\FundDbService;
use App\DbServices\LinkDbService;
use App\DbServices\ProfileDbService;

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

require __DIR__.'/provision.php';

$excelFileLocation = __DIR__.'/../../storage/data_set.xlsx';

$categoryDbService = new CategoryDbService();
$profileDbService = new ProfileDbService();
$fundDbService = new FundDbService();
$linkDbService = new LinkDbService();
$areaDbService = new AreaDbService();
$phpExcel = PHPExcel_IOFactory::load($excelFileLocation);

$sheet = $phpExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

for ($row = 2; $row <= $highestRow; $row++) {
    $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row)[0];

    $categoryName = $rowData[0];
    $profileName = $rowData[1];
    $fundTitle = $rowData[2];
    $linkUrl = $rowData[3];
    $nationalContactLinkUrl = $rowData[4];
    $areaName = $rowData[5];

    $categoryDbService->findOrCreateByName($categoryName);
    $profileDbService->findOrCreateByName($profileName);
    $fundDbService->findOrCreateByTitle($fundTitle);
    $linkDbService->findOrCreateByUrl($linkUrl);

    if (null !== $nationalContactLinkUrl) {
        $linkDbService->findOrCreateByUrl($nationalContactLinkUrl);
    }

    $areaDbService->findOrCreateByName($areaName);
}
