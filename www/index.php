<?php
require_once 'utils.inc.php';
require_once 'Controllers/IndexController.php';

$controller = new IndexController();

start_page();

$action = $_GET['action'];
switch ($action) {
    case 'read':
        echo $controller->read();
        break;
    case 'create':
        echo $controller->create();
        break;
    case 'update':
        echo $controller->update();
        break;
    case 'delete':
        echo $controller->delete();
        break;
}

end_page();

