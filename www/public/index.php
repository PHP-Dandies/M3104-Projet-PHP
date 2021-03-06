<?php
session_start();

var_dump($_SESSION);

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
    } elseif (str_contains($url[0], 'idee') && !isset($url[1])) {
        $controller = new  PublicController();
        $controller->readIdea(substr($url[0], -1));
    } elseif ($url[0] === 'admin') {
        $controller = new AdminController();
        if (!isset($url[1])) {
            $controller->readIndex();
        } elseif ($url[1] === 'campagnes') {
            if (!isset($url[2])) {
                $controller->readCampaigns();
            } elseif (is_numeric($url[2])) {
                if (!isset($url[3])) {
                    $controller->readIdeas($url[2]);
                } elseif ($url[3] === 'modifier' && !isset($url[4])) {
                    $controller->readModifyCampaign($url[2]);
                } elseif (str_contains($url[3], 'idee')) {
                    if (!isset($url[4])) {
                        $controller->readIdea(substr($url[3], -1));
                    }
                    elseif ($url[4] === 'modifier' && !isset($url[5])) {
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
        } else if ($url[1] === 'creer') {
            $controller->create();
        }
    } else if ($url[0] === 'jury') {
        if (!isset($_SESSION['user'])) {
            $controller = new JuryController();
            if (!isset($url[1])) {
                //mettre ici le /jury/ideeX pouru acceder a une id??e en partculier
                $controller->read();
            }
            else if ($url[1] === 'idee' && isset($url[2]) && is_numeric($url[2]) && !isset($url[3])) {
                $controller->readOne($url[2]);
            }
            else
                echo'Erreur';
                exit();
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
    } else if ($url[0] === 'idee'){ // /idea
        if (!empty($url[1]) && is_numeric($url[1])) {
            $controller = new PublicController();
            $controller->readIdea($url[1]);
        } else if (!empty($url[1]) && $url[1] === 'create') { // /idea/create
            $controller = new IdeaController();
            $controller->create();
        } else if (!empty($url[1]) && $url[1] === 'edit' && !empty($url[2]) && is_numeric($url[2])) { // /idea/edit/X
            $controller = new IdeaController();
            $controller->edit($url[2]);
        } else {
            echo '404';
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}