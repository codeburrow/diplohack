<?php namespace Database\commands;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  01/04/16
 */
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

$databaseLocation = __DIR__.'/../../storage/database.sql';

$dbMysqlAdminCredentials = 'mysqladmin -u'.getenv('DB_USER').' -p'.getenv('DB_PASSWORD').' ';

$dropDbCommand = $dbMysqlAdminCredentials.' -f DROP '.getenv('DB_NAME');
$createDbCommand = $dbMysqlAdminCredentials.' CREATE '.getenv('DB_NAME');

$dbMysqlCredentials = 'mysql -u'.getenv('DB_USER').' -p'.getenv('DB_PASSWORD').' ';
$importDbCommand = $dbMysqlCredentials.getenv('DB_NAME').' < '.$databaseLocation;

passthru($dropDbCommand);
passthru($createDbCommand);
echo "\nDatabase '".getenv('DB_NAME')."'' created.\n";

passthru($importDbCommand);
echo "\nImported database from $databaseLocation";

//echo exec($createDbCommand);
//echo exec($importDbCommand);
