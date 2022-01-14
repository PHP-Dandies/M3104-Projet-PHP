<?php

require_once('../Utils/Database.php');

class JuryModel {
    /**
     * @throws Exception
     */
    public static function getIdeas() : array {
        $query = "SELECT * FROM CAMPAIGN WHERE END_DATE = (SELECT MAX(END_DATE) FROM CAMPAIGN);";
        $campaign = Database::executeQuery($query);
        
        var_dump($campaign);
        die();
    }
}