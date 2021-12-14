<?php
require_once 'utils.inc.php';

start_page();

include 'AutoLoader.php';

$action = $_GET['action'] ?? null;
$controllerName = $_GET['controller'] ?? 'index' . 'Controller';

if (!class_exists($controllerName)) {
    $controllerName = 'indexController';
}

$response = null;

try {
    $controller = new $controllerName();

    $response = match ($action) {
        'create' => $controller->create(),
        'update' => $controller->update(),
        'delete' => $controller->delete(),
        default => $controller->read()
    };

} catch (Exception $ex) {
    echo $ex->getMessage();
    die();
}

var_dump($response);

end_page();

