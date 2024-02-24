<?php

use App\Http\Controllers\WineController;
use App\Response;
use Routes\Router;

require_once __DIR__ . '/../Config/config.php';

if (API_EXGIR_KEY && (!isset($_SERVER['HTTP_API_KEY']) || $_SERVER['HTTP_API_KEY'] !== API_KEY)) {
    echo Response::json(401, 'Acesso Negado');
    exit;
}

$router = new Router("v1");
$wineController = new WineController();
$id = '(\d+)';

$router->add('GET', '/', function () {
    echo Response::json(200, 'Bem-vindo a API do projeto ' . PROJECT_NAME, [
        'description' => 'Esta API foi desenvolvida utilizando PHP puro.',
        'api_version' => API_VERSION,
        'author' => AUTHOR,
    ]);
});

$router->add('GET', '/wine', function () use ($wineController) {
    echo $wineController->index();
});

$router->add('GET', '/wine/' . $id, function ($id) use ($wineController) {
    echo $wineController->show($id);
});

$router->add('POST', '/wine', function () use ($wineController) {
    $data = json_decode(file_get_contents("php://input"), true);
    echo $wineController->store($data);
});

$router->add('PUT', '/wine/' . $id, function ($id) use ($wineController) {
    $data = json_decode(file_get_contents("php://input"), true);
    echo $wineController->update($id, $data);
});

$router->add('DELETE', '/wine/' . $id, function ($id) use ($wineController) {

    echo $wineController->destroy($id);
});
