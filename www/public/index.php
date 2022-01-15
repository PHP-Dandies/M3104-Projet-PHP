<?php

session_start();

require_once('../Utils/AutoLoader.php');

try {
    $url = '';
    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        $url = explode('/', $url);
        if (str_contains($url[0], "Scripts")) {
            include '../' . $url;
            exit;
        }
    }

    if (isset($_GET['controller'], $_GET['action'])) {;
        $controllername = $_GET["controller"] . 'Controller';
        $controller =  new $controllername();
        $actionName = $_GET["action"];
        $controller->$actionName();

    } elseif ($url === '') {
        echo 'a';
    }
    else if ($url[0] === 'test' && !isset($url[1])){  //Changer, ici c'est la page de redirection quand le login est réussie
        include '../Views/User/ModificationReussie.php';
    }

    elseif ($url[0] === 'admin') {
        $controller = new AdminController();
        if (!isset($url[1])) {
            $controller->readIndex();
        } elseif ($url[1] === 'campagnes') {
            if (!isset($url[2])) {
                $controller->readCampaigns();
            } elseif (is_numeric($url[2])) {
                if (!isset($url[3])) {
                    $controller->readIdeas($url[2]);
                } elseif (str_contains($url[3], 'idee')) {
                    if (!isset($url[4])) {
                        $controller->readIdea(substr($url[3], -1));
                    } elseif ($url[4] === 'modify' && !isset($url[5])) {
                        $controller->readModifyIdea(substr($url[3], -1));
                    }
                }
            } elseif ($url[2] === 'creer' && !isset($url[3])) {
                $controller->createCampaign();
            }
        } elseif ($url[1] === 'utilisateurs' && !isset($url[2])) {
            $controller->readUsers();
        }
    } else if ($url[0] === 'login' && !isset($url[1])) {
        $controller = new UserController();
        $controller->index();
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
        } else if ($url[1] === 'idee' && isset($url[2]) && is_numeric($url[2]) && !isset($url[3])){
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
    } else if ($url[0] === 'orga' && empty($url[1])) {
        $controller = new OrgaController();
        $controller->ReadMine();
    } else {
        echo '404';
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}