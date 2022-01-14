<?php
//$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
//include $doc_root . '../Models/UserModel.php';
//include $doc_root . '../Classes/User/User.php';
include('../Utils/AutoLoader.php');
class UserController
{
    public function __construct(){
    }

    public function isSubmite($login, $password) : bool
    {
        $model = new UserModel();
        if ($model->isLogin($login))
        {

            if($model->isPassword($login, $password))
            {
                return true;
            }
        }
        return false;
    }

    public function changePassword($password)
    {
        //changer le password
        // Mano le fait
    }

    public function register($login, $password)
    {

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

    public function login() : void
    {
        ViewHelper::display(
        $this,
            'LoginView',
            array()
        );
    }

    public function test() : void
    {
        ViewHelper::display(
            $this,
            'ModificationReussie',
            array()
        );
    }
}
