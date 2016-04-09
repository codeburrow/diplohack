<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
use App\Controllers\Api\ApiFundingsController;
use App\Controllers\ApiDistrictsController;
use App\Controllers\ExceptionsController;
use App\Controllers\WelcomeController;
use App\Kernel\Router;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/bootstrap.php';

$router = new Router();

$router->get('/', new WelcomeController, 'landingPage');

// Api
$router->get('/api/v1/fundings', new ApiFundingsController, 'getFundings');
$router->get('/api/v1/districts/list', new ApiDistrictsController, 'getList');

// 404
$router->dispatch(new ExceptionsController(), 'notFound');

