<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */

use App\Controllers\ExceptionsController;
use App\Controllers\WelcomeController;
use App\Kernel\IoC;
use App\Kernel\Router;

session_start();

$_SESSION['CURRENT_URL'] = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

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

