<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");

//     return $response;
// });

$app = new \Slim\App;

require_once('../app/api/business.php');
require_once('../app/api/businessClass.php');
require_once('../database/SQLQuery.php');
// require_once('../database/DBConnect.php');


$app->run();