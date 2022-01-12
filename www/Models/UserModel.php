<?php

include('../Utils/AutoLoader.php');

// Models/UserModel.php
class UserModel {
    private $_username;

    public static function get_users() {
        $query = "SELECT * FROM USER";
        return Database::executeQuery($query);
    }

    public function __construct($username){
        $this->_username = $username;
    }

    /**
     * @throws Exception
     */
    public static function get_user(int $id) : array
    {
        $query = "SELECT * FROM USER WHERE USER_ID=$id";
        return Database::executeQuery($query);
    }

    public function get_username() {
        return $this->_username;
    }
}