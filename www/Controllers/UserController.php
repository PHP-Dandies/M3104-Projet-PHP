<?php
include('../Utils/AutoLoader.php');

$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);

class UserController
{
    public function __construct()
    {
    }

    public function Index()
    {
        $viewHelper = new ViewHelper();
        return $viewHelper->display(
            $this,
            'User',
            array(
                'html_head_title' => 'User/Login',
            )
        );

    }
    public function GetUser() {
        if( isset($_SESSION['user']) ) {
            return unserialize($_SESSION['user']);
        }
        return null;
    }

    public function login()
    {
        $loginError = null;
        $login = $_POST['login'];
        $password = $_POST['password'];
        $model = new UserModel();

        if( $this->GetUser() != null ) {
            $loginError = "Une session utilisateur existe déjà";
        }

        if ($model->isLogin($login)) {

            if ($model->isPassword($login, $password)) {
                session_start();

                $_SESSION["suid"] = session_id();
                $_SESSION['user'] = serialize($login);
                header('Location: test'); //  #TODO remplacer "test" par le fichier qui accueil l'utilisateur qui se connecte
                 exit();
            }
        }
        else {
            $loginError = "Nom d'utilisateur ou mot de passe incorrect";
        }

        ViewHelper::display(
            $this,
            'Login',
            array(
                $loginError
            )
        );

    }

    public function logout(){
        session_destroy();
        header('Location: ' . SITE_URL); //#TODO A la place de "SITE_URL" mettre l'accueil
        return;
    }

    public function changePassword($password)
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

    public function lautre() : void
    {
        ViewHelper::display(
        $this,
            'LoginView',
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
