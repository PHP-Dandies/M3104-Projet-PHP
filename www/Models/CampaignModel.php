<?php

require_once('../Utils/Database.php');

class CampaignModel {
    /**
     * @throws Exception
     */
    public static function get_campaigns() : array {
        $query = 'SELECT * FROM CAMPAIGN;';
        return Database::executeQuery($query);
    }

    public static function fetchNextCampaigns(){
        $query = "SELECT * FROM CAMAPAIGN WHERE STATUS = 'SCHEDUELED'";
    }

}