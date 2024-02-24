<?php

use App\Exceptions\AppException;
use App\Response;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/src/Routes/index.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];


try {
    $router->route($method, filter_var($path, FILTER_SANITIZE_URL));
} catch (AppException $e) {
    echo Response::json($e->getCode(), $e->getMessage());
} catch (Exception $e) {
    echo Response::json(500, $e->getMessage());
}
