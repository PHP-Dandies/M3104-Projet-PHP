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

    public static function get_running_campaing() {
        $query = 'SELECT CAMPAIGN_ID FROM CAMPAIGN WHERE STATUS = \'running\'';
        return Database::executeQuery($query)[0][0];
    }
}