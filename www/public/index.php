<?php
require_once('../Utils/AutoLoader.php');

try {
    $url = '';

    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        if (str_contains($url, "Scripts")) {
            include '../' . $url;
            exit;
        }
        $url = explode('/', $url);
    }

    if ($url === '') {
        echo 'acceuil';
    } else if ($url[0] === 'jury' && !isset($url[1])) {
        JuryController::read();
    } else if ($url[0] === 'users' && !isset($url[1])) {
        $controller = new UserController();
        $controller->read();
    } else if (isset($url[1], $url[2]) && $url[0] === 'users' && $url[1] === 'modify' && is_numeric($url[2])) {
        $controller = new UserController();
        $controller->editUser($url[2]);
    } else if ($url[0] === 'campaigns') {
        $controller = new CampaignController();
        if (!isset($url[1])) {
            $controller->read();
        } else {
            if (is_numeric($url[1])) {
                if (!isset($url[2])) {
                    $controller = new IdeaController();
                    $controller->readAll($url[1]);
                }
            } else if ($url[1] === 'idea' && isset($url[2]) && is_numeric($url[2])) {
                $controller = new IdeaController();
                $controller->read($url[2]);
            }
        }
    } else if ($url[0] === 'ideas') {
        if (!empty($url[1]) && is_numeric($url[1])) {
            $controller = new IdeaController();
            $controller->read($url[1]);
        }
    } else if ($url[0] === 'idea' && !empty($url[1]) && $url[1] === 'create') {
        $controller = new IdeaController();
        $controller->create();
    } else if ($url[0] === 'orga' && empty($url[1])) {
        $controller = new OrgaController();
        echo "test";
        $controller->ReadMine();
    } else {
        echo '404';
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}