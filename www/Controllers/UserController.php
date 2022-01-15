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

        if(isset($_SESSION['user'])) {
            echo 'deja connecté avec Utilisateur : ' . $_SESSION['user'];
            header('Location:  ');
            exit();
        }
        if ($model->isLogin($login)) {

            if ($model->isPassword($login, $password)) {
                $_SESSION['user'] = $login;
                $_SESSION['id']= UserModel::getId($login);
                $_SESSION['role']= UserModel::getRole($login);
                header('Location: test'); //  #TODO remplacer "test" par le fichier qui accueil l'utilisateur qui se connecte
                 exit();
            }
            else
                $loginError = 'Nom d\'utilisateur ou mot de passe incorrect';
        }
        else
            $loginError = 'Nom d\'utilisateur ou mot de passe incorrect';

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
        header('Location: ' . SITE_URL); //#TODO A la place de "SITE_URL" mettre l'accueil ou deconnecter l'utilisateur
        return;
    }

    public function changePassword($password) //#TODO ecrire la méthode
    {
        //changer le password
        // Mano le fait
    }

    public function read() : void {
        $users = UserModel::get_users();
        ViewHelper::display(
            $this,
            'Read',
            $users
        );
    }

    public function editUser(int $id) : void
    {
        $user = UserModel::get_user($id);
        ViewHelper::display(
            $this,
            'Edit',
            $user
        );
    }

    public function index() : void
    {
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
