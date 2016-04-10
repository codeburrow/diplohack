<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/7/16
 */
use App\Controllers\Api\ApiCategoriesController;
use App\Controllers\Api\ApiAreasController;
use App\Controllers\Api\ApiFundsController;
use App\Controllers\Api\ApiProfilesController;
use App\Controllers\ExceptionsController;
use App\Controllers\WelcomeController;
use App\Kernel\Router;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/bootstrap.php';

$router = new Router();

$router->get('/', new WelcomeController, 'welcome');
$router->get('/search', new WelcomeController, 'search');

// Api
$router->get('/api/v1/funds', new ApiFundsController, 'get');
$router->get('/api/v1/funds/search', new ApiFundsController, 'search');
$router->get('/api/v1/areas/list', new ApiAreasController, 'getList');
$router->get('/api/v1/profiles/list', new ApiProfilesController(), 'getList');
$router->get('/api/v1/categories/list', new ApiCategoriesController(), 'getList');

// 404
$router->dispatch(new ExceptionsController(), 'notFound');

