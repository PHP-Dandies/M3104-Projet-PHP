<?php

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
            'Login',
            array()
        );
    }
}
