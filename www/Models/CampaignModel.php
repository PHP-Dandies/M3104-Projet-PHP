<?php

include_once('../Utils/Database.php');

class CampaignModel {
    /**
     * @throws Exception
     */
    public static function get_campaigns() : array {
        $query = 'SELECT * FROM CAMPAIGNS;';
        return Database::executeQuery($query);
    }
}