<?php
include('../Utils/AutoLoader.php');

$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);

class UserController
{
    public function __construct()
    {
    }

    public function changePassword(){
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $controller = new ErrorController();

        if (UserModel::fetchPassword($oldPassword))
        {
            if ($newPassword == $confirmPassword)
            {
                UserModel::updatePassword($confirmPassword);
                header('Location: /');
                exit();
            }
            else
                $controller->error404('/');
        }
        else
            $controller->error404('/');
    }

    public  function setVoteJury(){
        UserModel::updatePoint(intdiv((int)CampaignModel::fetchMaxVoteJury(),UserModel::countJury()));
    }

    public function login()
    {
        $loginError = null;

        $login = $_POST['login'];
        $password = $_POST['password'];
        $model = new UserModel();

        if(isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }
        if ($model->ExistLogin($login)) {
            if ($model->ExistPassword($login, $password)) {
                $_SESSION['user'] = $login;
                $_SESSION['id']= UserModel::fetchId($login);
                $_SESSION['role']= UserModel::fetchRole($login);
                header('Location: /');
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
        header('Location: /');
        return;
    }

    public function sendEmailAdmin($username, $userEmail, $password)
    {
       $email = UserModel::fetchEmailAdmin();
       mail($email,
           'Changer le mot de passe',
           'Vous devez changer le mot de passe de l\'utilisateur : ' . $username . '. Envoyer le à : ' . $userEmail . ' avec le mot de passe : '. $password .'.');
    }

    public function indexRegisterLoginEmail()
    {
        header('Location : AskLoginEmail');
        exit();
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

    public function indexPassword() : void
    {
        ViewHelper::display(
            $this,
            'PasswordChange',
            array()
        );
    }
}
