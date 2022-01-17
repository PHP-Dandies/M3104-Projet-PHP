<?php

require_once('../Utils/Database.php');

class JuryModel {
    /**
     * @throws Exception
     */
    public static function  getIdeas() : array {
        $query = "SELECT CAMPAIGN_ID FROM CAMPAIGN WHERE `STATUS` = 'deliberation';";
        $campaign = Database::executeQuery($query);

        return Database::executeQuery("SELECT * FROM `idea` WHERE CAMPAIGN_ID = "
                                            . $campaign[0]['CAMPAIGN_ID'] . " ORDER BY TOTAL_POINTS DESC;");
    }

    public static function getIdea($idea_id) {
        return IdeaModel::fetchAllInfoFromId($idea_id);
    }
}