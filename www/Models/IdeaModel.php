<?php

require_once('../Utils/Database.php');

class IdeaModel {
    /**
     * @throws Exception
     */
    public static function fetchIdeas($campaignID) : ?array {
        return Database::executeQuery('SELECT * FROM `IDEA` WHERE CAMPAIGN_ID = '.$campaignID.' ORDER BY TOTAL_POINTS DESC;');
    }


    /**
     * @throws Exception
     */
    public static function fetchIdea($ideaID) : array {
        $data = array();

        $data["IDEA"] = Database::executeQuery("SELECT * FROM IDEA WHERE IDEA_ID = $ideaID")[0];

        $data["USER"] = Database::executeQuery("SELECT USER.USER_ID, USER.USERNAME FROM USER, IDEA WHERE USER.USER_ID = IDEA.USER_ID")[0];

        $data["COMMENTS"] = Database::executeQuery("SELECT * FROM COMMENT WHERE IDEA_ID = $ideaID");

        $usernames = Database::executeQuery("SELECT USERNAME FROM USER, COMMENT WHERE USER.USER_ID = COMMENT.USER_ID");
        for ($i = 0, $iMax = count($data["COMMENTS"]); $i < $iMax; ++$i) {
            $data["COMMENTS"][$i]["USERNAME"] = $usernames[$i]["USERNAME"];
        }

        $data["CONTENTS"] = Database::executeQuery("SELECT * FROM UNLOCKABLE_CONTENT WHERE IDEA_ID = $ideaID");

        return $data;
    }
}
