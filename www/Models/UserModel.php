<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root,0,-6).'/Classes/User/User.php';
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
    static function getId($username) : string
    {
        $query = database::executeQuery("SELECT USER_ID FROM USER WHERE USERNAME ='$username'")[0];
        return $query['USER_ID'];
    }

    static function getRole($username) : string
    {
        $query = database::executeQuery("SELECT ROLE FROM USER WHERE USERNAME ='$username'")[0];
        return $query['ROLE'];
    }

    static function getEmailAdmin(): string
    {
        $query = database::executeQuery("SELECT EMAIL FROM USER WHERE ROLE='ADMIN';")[0];
        return $query['EMAIL'];
    }

    static function getEmailUser($username): string
    {
        $query = database::executeQuery("SELECT EMAIL FROM USER WHERE USER='$username';")[0];
        return $query['EMAIL'];
    }

    static function fetchPassword($password) : bool
    {
        $user_id = $_SESSION['id'];
        return Database::executeCount("SELECT PASSWORD FROM USER WHERE PASSWORD='$password' AND USER_ID = '$user_id';") >1;
    }

    static function updatePassword($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        Database::executeUpdate("UPDATE USER SET PASSWORD = '$hashPassword' WHERE PASSWORD = '$password';");
    }

    function isLogin ($username): bool
    {
        return database::executeCount("SELECT COUNT(*) FROM USER WHERE USERNAME = '$username';") >= 1;
    }

    function isPassword ($username, $password): bool
    {
        return password_verify($password, database::executeQuery("SELECT PASSWORD FROM USER WHERE USERNAME='$username';")[0]["PASSWORD"]);
    }


}