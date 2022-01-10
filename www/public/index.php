<?php
require_once ('../Utils/AutoLoader.php');

try {
    $url = '';

    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        $url = explode('/', $url);
    }

    if ($url === '') {
        echo 'acceuil';
    } else if ($url[0] === 'campaigns') {
        $controller = new CampaignController();
        $controller->read();
    } else if ($url[0] === 'campaign' && !empty($url[1])) {
        echo 'Campagne numéro ' . $url[1];
    } else {
        echo '404';
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}



/*
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
*/