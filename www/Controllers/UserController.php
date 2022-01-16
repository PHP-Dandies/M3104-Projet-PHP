<?php
include('../Utils/AutoLoader.php');

$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);

class UserController
{
    public function __construct()
    {
    }

    public function login()
    {
        $loginError = null;

        $login = $_POST['login'];
        $password = $_POST['password'];
        $model = new UserModel();

        if(!empty($_SESSION)) {
            header('Location: /');
            exit();
        }
        if (UserModel::userNameExists($login)) {
            if ($model->isPassword($login, $password)) {
                $_SESSION['user'] = $login;
                $_SESSION['id']= UserModel::fetchId($login);
                $_SESSION['role']= UserModel::fetchRole($login);
                header('Location: /'); //  #TODO remplacer "test" par le fichier qui accueil l'utilisateur qui se connecte
                 exit();
            }
            $loginError = 'Nom d\'utilisateur ou mot de passe incorrect';
        }
        else {
            $loginError = 'Nom d\'utilisateur ou mot de passe incorrect';
        }

        ViewHelper::display(
            $this,
            'Login',
            array(
                'loginError' =>  $loginError,
            )
        );
    }

    public function logout(){
        session_destroy();
        header('Location: /');
        die();
    }

    public function changePassword($password) //#TODO ecrire la méthode
    {
        //changer le password
        // Mano le fait
    }

    public function read() : void {
        $users = UserModel::fetchAll();
        ViewHelper::display(
            $this,
            'Read',
            $users
        );
    }

    public function editUser(int $id) : void
    {
        $user = UserModel::fetchUser($id);
        ViewHelper::display(
            $this,
            'Edit',
            $user
        );
    }

    public function index() : void
    {
        if(!empty($_SESSION)) {
            header('Location: /');
            exit();
        }

        ViewHelper::display(
        $this,
            'Login',
            array()
        );
    }


// A supprimer si la nouvelle méthode marche

//
//    public function test() : void
//    {
//        ViewHelper::display(
//            $this,
//            'ModificationReussie',
//            array()
//        );
//    }
}
