<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */

use App\Kernel\DbManager;
use App\Kernel\IoC;

session_start();

$_SESSION['CURRENT_URL'] = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

// Environment variables

try {
    $dotenv = new Dotenv\Dotenv(__DIR__.DIRECTORY_SEPARATOR.'..');
    $dotenv->load();
    $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD'])->notEmpty();
} catch (Exception $e) {
// catch exception -- means it's on production no env.
}

IoC::register(DbManager::class, function () {
    $dbManager = new DbManager();

    return $dbManager;
});

