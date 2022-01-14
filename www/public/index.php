<?php
session_start();

require_once('../Utils/AutoLoader.php');
define('SITE_URL',
    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/'
);


try {
    $url = '';
    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        $url = explode('/', $url);
        if(array_key_exists('controller', $_GET)) {
            $controllername = $_GET['controller'] . 'Controller';
            $controller = new $controllername();

            $action = $_GET['action'];
            $controller->$action();
//            var_dump($controller);
//            die();
        }
    }

    if ($url === '') {
        echo 'acceuil';
    } else if ($url[0] === 'login' && !isset($url[1])) {
        $controller = new UserController();
        $controller->lautre();
    } else if ($url[0] === 'organisateur') {
        $controller = new OrganizerController();
        if (!isset($url[1])) {
            $controller->read();
        } else if ($url[1] === 'creer') {
            $controller->create();
        }
    } else if ($url[0] === 'jury') {
        if (!isset($_SESSION['suid'])) {
            header('Location: /login');
        }
        $controller = new JuryController();
        if (!isset($url[1])) {
            $controller->read();
        } else if ($url[1] === 'idee' && isset($url[2]) && is_numeric($url[2]) && !isset($url[3])) {
            $controller->readOne($url[2]);
        }
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
    } else {
        echo '404';
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}


//define('PROJECT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
//include PROJECT_PATH . '../Scripts/CheckCredential.php';
//die();
//require_once('../Utils/AutoLoader.php');
//
//try {
////    var_dump($_GET);
////    die();
//    $url = '';
//
//    if (isset($_GET['url'])) {
//        $url = $_GET['url'];
////        var_dump($url);
////        die();
//        if (str_contains($url, "Scripts")) {
//            var_dump($url);
//            include '../' . $url;
//            exit();
//        }
//        $url = explode('/', $url);
//    }
//    if ($url === '') {
//        echo 'acceuil';
//    }
//    if ($url[0] === 'test' && !isset($url[1])){
//        include '../Views/User/ModificationReussie.php';
//    }
//
//    else if($url[0] === 'login' && !isset($url[1]))
//    {
//        $controller = new UserController();
//        $controller->lautre();
//    }
//    else if ($url[0] === 'users' && !isset($url[1])) {
//        $controller = new UserController();
//        $controller->read();
//    } else if (isset($url[1], $url[2]) && $url[0] === 'users' && $url[1] === 'modify' && is_numeric($url[2])) {
//        $controller = new UserController();
//        $controller->editUser($url[2]);
//    } else if ($url[0] === 'campaigns') {
//        $controller = new CampaignController();
//        $controller->read();
//    } else if ($url[0] === 'campaign' && !empty($url) && $url[1] === 'create') {
//        $controller = new CampaignController();
//        $controller->create();
//    } else if ($url[0] === 'campaign' && !empty($url[1]) && is_numeric($url[1])) {
//        $controller = new IdeaController();
//        $controller->read($url[1]);
//    } else if ($url[0] === 'ideas') {
//        if (!empty($url) && is_numeric($url[1])) {
//            $controller = new IdeaController();
//            $controller->read($url[1]);
//        }
//    } else if ($url[0] === 'idea' && !empty($url[1]) && $url[1] === 'create') {
//        $controller = new IdeaController();
//        $controller->create();
//    } else {
//        echo '404';
//    }
//} catch (Exception $e) {
//    echo $e->getMessage();
//    die();
//}