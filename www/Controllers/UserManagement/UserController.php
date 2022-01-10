<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root . '/Models/UserModel';
include $doc_root . '/Classes/Controller/Controller.php';
include $doc_root . '/Classes/User/User.php';
class UserController extends Controller
{
    public function __construct()
    {
        $this->loadModel('UserModel');
    }

    public function isSubmite($login, $password)
    {
        $TrueLogin = $this->UserModel->getUserByUsername($login);
        if ($login == $TrueLogin)
        {
            if($password == User().getPassword())
                return true;
            else
                return false;

        }
        else return false;
    }

    public function changePassword($password)
    {
        //changer le password
        // Mano le fait
    }

    public function register($login, $password)
    {

    }

    //$this->render('DOSSIER', 'Fichier', ['articles' => $articles]); ou $this->render('index', compact('articles'));
    //Sert a envoyer les données à la vue
}
