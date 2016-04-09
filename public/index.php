<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
use App\Controllers\Api\ApiCategoriesController;
use App\Controllers\Api\ApiDistrictsController;
use App\Controllers\Api\ApiFundingsController;
use App\Controllers\Api\ApiProfilesController;
use App\Controllers\ExceptionsController;
use App\Controllers\WelcomeController;
use App\Kernel\Router;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/bootstrap.php';

$router = new Router();

$router->get('/', new WelcomeController, 'landingPage');

// Api
$router->get("/api/v1/fundings", new ApiFundingsController, 'getAll');
$router->get('/api/v1/districts/list', new ApiDistrictsController, 'getList');
$router->get('/api/v1/profiles/list', new ApiProfilesController(), 'getList');
$router->get('/api/v1/categories/list', new ApiCategoriesController(), 'getList');

// 404
$router->dispatch(new ExceptionsController(), 'notFound');

