<?php namespace Database\commands;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  01/04/16
 */
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

$databaseLocation = __DIR__.'/../../tests/_data/dump.sql';

$dbMysqlCredentials = 'mysqldump -u'.getenv('DB_USER').' -p'.getenv('DB_PASSWORD').' ';

$exportDbCommand = $dbMysqlCredentials.getenv('DB_NAME').' > '.$databaseLocation;

passthru($exportDbCommand);

echo "\nExported database to $databaseLocation";

