<?php
// Models/UserModel.php
class UserModel {
    private $_username;

    public function __construct($username){
        $this->_username = $username;
    }
    public function get_username() {
        return $this->_username;
    }
}