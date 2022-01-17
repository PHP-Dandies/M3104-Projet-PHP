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

    public function login()
    {
        CampaignModel::fetchMaxVoteJury();
        $loginError = null;

        $login = $_POST['login'];
        $password = $_POST['password'];
        $model = new UserModel();

        if(isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }
        if ($model->isLogin($login)) {
            if ($model->isPassword($login, $password)) {
                $_SESSION['user'] = $login;
                $_SESSION['id']= UserModel::getId($login);
                $_SESSION['role']= UserModel::getRole($login);
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

    public function sendEmailAdmin($username, $userEmail)
    {
       $email = UserModel::getEmailAdmin();
       mail($email,
           'Change Password',
           'You have to change' . $username . '\'s password. Send it at : ' . $userEmail . '.');

    }

    public function RegisterLoginEmail()
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
