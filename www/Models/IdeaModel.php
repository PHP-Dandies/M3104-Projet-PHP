<?php

require_once('../Utils/Database.php');

class IdeaModel {
    /**
     * @throws Exception
     */
    public static function fetchIdeas($campaignID) : array {
        return Database::executeQuery("SELECT * FROM IDEA WHERE CAMPAIGN_ID = $campaignID");
    }

    /**
     * @throws Exception
     */
    public static function fetchTheIdea($ideaID) : array {
        $result = database::executeQuery("SELECT * FROM IDEA WHERE IDEA_ID = $ideaID;");
        return empty($result) ? array() : $result[0];
    }

    public static function  fetchIdeasDelib() : array {
        $query = "SELECT CAMPAIGN_ID FROM CAMPAIGN WHERE `STATUS` = 'deliberation';";
        $campaign = Database::executeQuery($query);

        return Database::executeQuery("SELECT * FROM `idea` WHERE CAMPAIGN_ID = "
            . $campaign[0]['CAMPAIGN_ID'] . " ORDER BY TOTAL_POINTS DESC;");
    }

    public static function fetchAllInfoFromIdea($ideaID) : array {
    $data = array();

    $result = self::fetchTheIdea($ideaID);
    if (empty($result)) {
        return array();
    }
    $data["IDEA"] = $result;

    $data["USER"] = Database::executeQuery("SELECT USER.USER_ID, USER.USERNAME FROM USER, IDEA WHERE USER.USER_ID = IDEA.USER_ID")[0];

    $data["COMMENTS"] = Database::executeQuery("SELECT * FROM COMMENT WHERE IDEA_ID = $ideaID");

    $usernames = Database::executeQuery("SELECT USERNAME FROM USER, COMMENT WHERE USER.USER_ID = COMMENT.USER_ID");
    for ($i = 0, $iMax = count($data["COMMENTS"]); $i < $iMax; ++$i) {
        $data["COMMENTS"][$i]["USERNAME"] = $usernames[$i]["USERNAME"];
    }

    $data["CONTENTS"] = Database::executeQuery("SELECT * FROM UNLOCKABLE_CONTENT WHERE IDEA_ID = $ideaID");

    return $data;
    }

    public  static function acceptIdea($id){
        Database::executeUpdate("UPDATE IDEA SET REALIZED = '1' WHERE IDEA_ID = $id ;");
    }

}
