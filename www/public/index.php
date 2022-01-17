<?php
session_start();

const DONOR = 'donor';
const ADMIN = 'admin';
const JURY = 'jury';
const ORGANIZER = 'organizer';
const _PUBLIC = 'public';

require_once('../Utils/AutoLoader.php');

try {
    $url = '';
    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        if ($url[strlen($url) - 1] === '/') {
            $url = substr($url, 0, -1);
            header('Location: /' . $url);
            exit();
        }
        $url = explode('/', $url);
        if ($url[array_key_last($url)] === '') {
            unset($url[array_key_last($url)]);
        }
    }
    if (isset($_GET['controller'], $_GET['action'])) {
        $controllerName = $_GET["controller"] . 'Controller';
        $controller = new $controllerName();

        $actionName = $_GET["action"];
        $controller->$actionName();
    } elseif ($url === '') {
        $controller = new PublicController();
        $controller->readIdeas();
    } elseif (str_contains($url[0], 'idee') && isset($url[1]) && is_numeric($url[1]) && !isset($url[2])) {
        $controller = new  PublicController();
        $controller->readIdea($url[1]);
    } elseif ($url[0] === 'admin') {
        $controller = new AdminController();
        if (!isset($url[1])) {
            $controller->readIndex();
        } elseif ($url[1] === 'campagnes') {
            if (!isset($url[2])) {
                $controller->readCampaigns();
            } elseif ($url[2] === 'creer' && !isset($url[3])){
                $controller->readCreateCampaign();
            } elseif (is_numeric($url[2])) {
                if (!isset($url[3])) {
                    $controller->readIdeas($url[2]);
                } elseif ($url[3] === 'modifier' && !isset($url[4])) {
                    $controller->readModifyCampaign($url[2]);
                } elseif (str_contains($url[3], 'idee')) {
                    if (!isset($url[4])) {
                        $controller->readIdea(substr($url[3], -1));
                    } elseif ($url[4] === 'modify' && !isset($url[5])) {
                        $controller->readModifyIdea(substr($url[3], -1));
                    }
                } elseif ($url[3] === 'modifier' && !isset($url[4])) {
                    $controller->readModifyCampaign($url[2]);
                }
            } elseif ($url[2] === 'creer' && !isset($url[3])) {
                $controller->readCreateCampaign();
            }
        } elseif ($url[1] === 'utilisateurs' && !isset($url[2])) {
            $controller->readUsers();
        }
    } else if ($url[0] === 'login' && !isset($url[1])) {
        $controller = new UserController();
        $controller->Index();
    } else if ($url[0] === 'organisateur') {
        $controller = new OrganizerController();
        if (!isset($url[1])) {
            $controller->read();
        } else if ($url[1] === 'creer' && !isset($url[2])) {
            $controller->readCreate();
        } else if ($url[1] === 'modifier' && isset($url[2]) && is_numeric($url[2]) && !isset($url[3])) {
            $controller->readEdit($url[2]);
        } else {
            $controller = new ErrorController();
            $controller->error404('/');
        }
    } else if ($url[0] === 'jury') {
        if (!isset($_SESSION['user'])) {
            $controller = new JuryController();
            if (!isset($url[1])) {
                //mettre ici le /jury/ideeX pour acceder a une idée en partculier
                $controller->read();
            }
            else if ($url[1] === 'idee' && isset($url[2]) && is_numeric($url[2]) && !isset($url[3])) {
                $controller->readOne($url[2]);
            }
            else {
                echo 'Erreur';
                exit();
            }
        }
    } else if ($url[0] === 'users' && !isset($url[1])) {
        $controller = new UserController();
        $controller->read();
    } else {
        $controller = new ErrorController();
        $controller->error404('/');
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}