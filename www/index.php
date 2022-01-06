<?php

define('PROJECT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

var_dump(PROJECT_PATH);
var_dump(SITE_URL);

require_once 'utils.inc.php';

start_page();

include 'Utils/AutoLoader.php';

$action = $_GET['action'] ?? null;
$controllerName = $_GET['controller'] ?? 'Index' . 'Controller';

if (!class_exists($controllerName)) {
    $controllerName = 'IndexController';
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
    echo 'prout' . $ex->getMessage();
    die();
}

end_page();

