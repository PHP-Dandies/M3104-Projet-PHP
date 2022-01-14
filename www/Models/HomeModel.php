<?php

class HomeModel
{
    public static function getIdeas() : array {
        $query = "SELECT CAMPAIGN_ID FROM CAMPAIGN WHERE `STATUS` = 'running';";
        $campaign = Database::executeQuery($query);

        return Database::executeQuery("SELECT * FROM `idea` WHERE CAMPAIGN_ID = "
            . $campaign[0]['CAMPAIGN_ID'] . " ORDER BY TOTAL_POINTS DESC;");
    }
}