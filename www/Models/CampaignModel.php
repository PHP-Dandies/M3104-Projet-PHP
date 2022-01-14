<?php

require_once('../Utils/Database.php');

class CampaignModel {
    /**
     * @throws Exception
     */
    public static function fetchCampaigns() : array {
        return Database::executeQuery("SELECT * FROM CAMPAIGN;");
    }
}