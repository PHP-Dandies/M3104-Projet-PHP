<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/Classes/User/User.php';
class UserModel
{
    public function __construct()
    {
    }

    function getAllUsers()
    {
        $query = database::executeQuery('SELECT * FROM USER;');
        $userList = NAN;

        foreach ($query as $user)
        {
            $userList[] = new User($user['USER_ID'],
                $user['USERNAME'],
                $user['PASSWORD'],
                $user['ROLE'],
                $user['AVAILABLE_POINTS'],
                $user['EMAIL']);
        }
        return $userList;
    }


    function getUserWithId($id): User
    {
        $query = database::executeQuery("SELECT * FROM USER WHERE USER_ID='$id';")[0];
        $user = new User($query['USER_ID'],
            $query['USERNAME'],
            $query['PASSWORD'],
            $query['ROLE'],
            $query['AVAILABLE_POINTS'],
            $query['EMAIL']);
        return $user;
    }

    function getUserByUsername ($username): User
    {
        $query = database::executeQuery("SELECT * FROM USER WHERE USERNAME = '$username' ;")[0];
        $user = new User($query['USER_ID'],
            $query['USERNAME'],
            $query['PASSWORD'],
            $query['ROLE'],
            $query['AVAILABLE_POINTS'],
            $query['EMAIL']);
        return $user;

    }
    function isExist ($username, $password): bool
    {
        return database::executeCount("SELECT COUNT(*) FROM USER WHERE USERNAME = '$username' AND PASSWORD='$password';") >= 1;
    }

    function getPassword ($username, $password) : User
    {
        $query = database::executeQuery("SELECT * FROM USER WHERE USERNAME='$username' AND PASSWORD='$password';")[0];
        $user = new User($query['USER_ID'],
            $query['USERNAME'],
            $query['PASSWORD'],
            $query['ROLE'],
            $query['AVAILABLE_POINTS'],
            $query['EMAIL']);
        var_dump($user);
        return $user;
    }


}