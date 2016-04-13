<?php
/**
 * Drops all database tables.
 *
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/11/16
 */
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../app/bootstrap.php';

use Database\migrations\DatabaseMigration;

DatabaseMigration::down();

