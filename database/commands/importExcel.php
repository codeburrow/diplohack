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
use Database\migrations\AreaFundTableMigration;
use Database\migrations\AreasTableMigration;
use Database\migrations\CategoriesTableMigration;
use Database\migrations\CategoryFundTableMigration;
use Database\migrations\DropBoxTokensTableMigration;
use Database\migrations\FundLinkTableMigration;
use Database\migrations\FundProfileTableMigration;
use Database\migrations\FundsTableMigration;
use Database\migrations\LinksTableMigration;
use Database\migrations\ProfilesTableMigration;
use Dropbox\Client;

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

// Relation tables
AreaFundTableMigration::down();
CategoryFundTableMigration::down();
FundLinkTableMigration::down();
FundProfileTableMigration::down();
// Primary tables
FundsTableMigration::down();
AreasTableMigration::down();
CategoriesTableMigration::down();
LinksTableMigration::down();
ProfilesTableMigration::down();
// Primary tables
FundsTableMigration::up();
AreasTableMigration::up();
CategoriesTableMigration::up();
LinksTableMigration::up();
ProfilesTableMigration::up();
DropBoxTokensTableMigration::up();
// Relation tables
AreaFundTableMigration::up();
CategoryFundTableMigration::up();
FundLinkTableMigration::up();
FundProfileTableMigration::up();

$excelPath = __DIR__.'/../../storage/data_set.xlsx';
$excelName = 'data_set.xlsx';

$dropBoxTokenDbService = new DropBoxTokenDbService();
$accessToken = $dropBoxTokenDbService->getLatest()['token'];

$dbxClient = new Client($accessToken, "PHP-Example/1.0");

$excelFile = fopen($excelPath.$excelName, "w+b");

echo "Retrieving $excelName from DropBox.\n";

$fileMetadata = $dbxClient->getFile("/$excelName", $excelFile);

echo "DropBox file imported to $excelPath.\n";

$categoryDbService = new CategoryDbService();
$profileDbService = new ProfileDbService();
$fundDbService = new FundDbService();
$linkDbService = new LinkDbService();
$areaDbService = new AreaDbService();
$phpExcel = PHPExcel_IOFactory::load($excelPath);

$sheet = $phpExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

echo "Inserting excel data into database.\n";

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

echo "Done.\n";
