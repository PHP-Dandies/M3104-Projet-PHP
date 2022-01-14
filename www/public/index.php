<?php

session_start();

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
    } else if ($url[0] === 'login' && !isset($url[1])) {
        $controller = new UserController();
        $controller->login();
    } else if ($url[0] === 'jury') {
        if (!isset($_SESSION['suid'])) {
            header('Location: /login');
        }
        $controller = new JuryController();
        if (!isset($url[1])) {
            $controller->read();
        } else if ($url[1] === 'idee' && isset($url[2]) && is_numeric($url[2]) && !isset($url[3])){
            $controller->readOne($url[2]);
        }
    } else if ($url[0] === 'users' && !isset($url[1])) {
        $controller = new UserController();
        $controller->read();
    } else if (isset($url[1], $url[2]) && $url[0] === 'users' && $url[1] === 'modify' && is_numeric($url[2])) {
        $controller = new UserController();
        $controller->editUser($url[2]);
    } else if ($url[0] === 'users' && !empty($url) && $url[1] === 'usermanagement') {
        $controller = new UserController();
        $controller->userManagement();

// admin
    } else if ($url[0] ==='admin' && !isset($url[1])) {
        $controller = new AdminController();
        $controller->read();
    } else if ($url[0] ==='admin' && !empty($url) && $url[1]=== 'campaign') {
        $controller = new CampaignController();
        $controller->create();

    } else if ($url[0] ==='admin' && !empty($url) && $url[1]=== 'usermanagement') {
        $controller = new UserController();
        $controller->userManagement();

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
        if (!empty($url) && is_numeric($url[1])) {
            $controller = new IdeaController();
            $controller->read($url[1]);
        }
    } else if ($url[0] === 'idea' && !empty($url[1]) && $url[1] === 'create') {
        $controller = new IdeaController();
        $controller->create();
    } else {
        echo '404';
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}