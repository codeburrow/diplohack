<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
use App\Controllers\ExceptionsController;
use App\Controllers\WelcomeController;
use App\Kernel\IoC;
use App\Kernel\Router;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/bootstrap.php';

$router = IoC::resolve(Router::class);

$router->get('/', IoC::resolve(WelcomeController::class), 'landingPage');

// 404
$router->dispatch(IoC::resolve(ExceptionsController::class), 'notFound');

