<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include '../Views/User/PasswordChangeView.php';

class PasswordChangeController {
    var $var = array();
    var $layout = 'default';

    function __construct(){
        if (isset($_POST)){
           $this->data = $_POST;
        }
        if (isset($this->models)){
            foreach ($this->models as $v){
                $this->loadModel($v);
            }
        }
    }

    function set($z){
        $this->vars = array_merge($this->vars,$z);
    }

    function render($file_name){
        extract($this->vars);
        ob_start();
        require('../Views/User'.get_class($this).'/'.$file_name.'.php');
        $content_for_layout = ob_get_clean();
        if ($this->layout == false){
            echo $content_for_layout;
        }
    }

    function loadModel($name){
        require_once('../Models'.strtolower($name).'.php');
        $this->$name = new $name;
    }

}


function updatePasswordChange ($id, $password){
    $result = $dbh->query('SELECT * FROM user WHERE id"'.$id.'"');
    $row = $result->fetch();
    $login_user = $row[8];
    $id = $row[10];
    $new_id = md5($password + $login_user);
    $dbh->exec("UPDATE user SET password=md5('". $new_password."'), id='". $new_id . "' WHERE id='".$id."'");

    return $login_user;

}