<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */

use App\Controllers\ExceptionsController;
use App\Controllers\WelcomeController;
use App\Kernel\DbManager;
use App\Kernel\IoC;
use App\Kernel\Router;

session_start();

$_SESSION['CURRENT_URL'] = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

// Environment variables
$dotenv = new Dotenv\Dotenv(__DIR__.DIRECTORY_SEPARATOR.'..');
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD'])->notEmpty();

// Inversion of Control
IoC::register(Router::class, function () {
    $router = new Router();

    return $router;
});

IoC::register(WelcomeController::class, function () {
    $welcomeController = new WelcomeController();

    return $welcomeController;
});

IoC::register(ExceptionsController::class, function () {
    $exceptionsController = new ExceptionsController();

    return $exceptionsController;
});

IoC::register(DbManager::class, function () {
    $dbManager = new DbManager();

    return $dbManager;
});

