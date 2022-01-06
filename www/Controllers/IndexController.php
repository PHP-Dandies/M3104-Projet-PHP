<?php
    class IndexController {
        public function __construct()
        {
        }

        public function index(){
            $db = new Database();
            $sql = "SELECT * FROM user WHERE LOGIN = 'TEST ABC' AND PASSWORD = 'TEST'";
            $result = $db->execQuery($sql);
            $utlisateur = new UserModel($result[0]['LOGIN']);

            return ViewHelper::Display($this,'Index', array('utilisateur' => $utlisateur));
        }
    }
