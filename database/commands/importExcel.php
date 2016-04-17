<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
use App\DbServices\AreaDbService;
use App\DbServices\CategoryDbService;
use App\DbServices\DropBoxTokenDbService;
use App\DbServices\FundDbService;
use App\DbServices\LinkDbService;
use App\DbServices\ProfileDbService;
use Dropbox\Client;

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

require __DIR__.'/provision.php';

$excelPath = __DIR__.'/../../storage/data_set.xlsx';
$excelName = 'data_set.xlsx';

$dropBoxTokenDbService = new DropBoxTokenDbService();
$accessToken = $dropBoxTokenDbService->getLastToken();

$dbxClient = new Client($accessToken, "PHP-Example/1.0");

$file = fopen($excelPath.$fileName, "w+b");

$fileMetadata = $dbxClient->getFile("/$excelName", $file);

fclose($file);
print_r($fileMetadata);

$categoryDbService = new CategoryDbService();
$profileDbService = new ProfileDbService();
$fundDbService = new FundDbService();
$linkDbService = new LinkDbService();
$areaDbService = new AreaDbService();
$phpExcel = PHPExcel_IOFactory::load($excelPath);

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

    $category = $categoryDbService->findOrCreateByName($categoryName);
    $profile = $profileDbService->findOrCreateByName($profileName);
    $fund = $fundDbService->findOrCreateByTitle($fundTitle);
    $area = $areaDbService->findOrCreateByName($areaName);
    $link = $linkDbService->findOrCreateByUrl($linkUrl);

    if (null !== $nationalContactLinkUrl) {
        $linkDbService->findOrCreateByUrl($nationalContactLinkUrl);
    }

    $fundDbService->assignAreaById($fund['id'], $area['id']);
    $fundDbService->assignCategoryById($fund['id'], $category['id']);
    $fundDbService->assignLinkById($fund['id'], $link['id']);
    $fundDbService->assignProfileById($fund['id'], $profile['id']);
}
