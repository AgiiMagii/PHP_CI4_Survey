<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Tests;
use App\Controllers\Questions;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
*/
$routes->group('api/tests', function($routes) {
    $routes->get('', [Tests::class, 'index']);
    $routes->get('(:num)', [Tests::class, 'show/$1']);
    $routes->get('(:num)/questions', [Questions::class, 'getQuestionsByTestId/$1']);
    $routes->post('', [Tests::class, 'create']);
    $routes->put('(:num)', [Tests::class, 'update/$1']);
    $routes->delete('(:num)', [Tests::class, 'delete/$1']);
});
/*|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
*/
$routes->get('tests', 'Pages::view/tests');
$routes->get('(:segment)', [Pages::class, 'view']);
$routes->get('(:segment)/(:segment)', [Pages::class, 'view/$1/$2']);

