<?php

require_once('../Utils/Database.php');

class IdeaModel {
     private $_ideas;

    public function __construct($ideas){
        $this->_ideas = $ideas;
    }

    /**
     * @throws Exception
     */
    public static function fetchIdeas($campaignID) : array {
        return Database::executeQuery("SELECT * FROM IDEA WHERE CAMPAIGN_ID = $campaignID");
    }

    /**
     * @throws Exception
     */
    public static function fetchIdea($ideaID) : array {
        return Database::executeQuery("SELECT * FROM IDEA WHERE CAMPAIGN_ID = $ideaID");
    }

    /**
     * @throws Exception
     */
    public static function get_idea($idea_id) : array {
        $data = array();

        $data["IDEA"] = Database::executeQuery("SELECT * FROM IDEA WHERE IDEA_ID = $idea_id")[0];

        $data["USER"] = Database::executeQuery("SELECT USER.USER_ID, USER.USERNAME FROM USER, IDEA WHERE USER.USER_ID = IDEA.USER_ID")[0];

        $data["COMMENTS"] = Database::executeQuery("SELECT * FROM COMMENT WHERE IDEA_ID = $idea_id");

        $usernames = Database::executeQuery("SELECT USERNAME FROM USER, COMMENT WHERE USER.USER_ID = COMMENT.USER_ID");
        for ($i = 0, $iMax = count($data["COMMENTS"]); $i < $iMax; ++$i) {
            $data["COMMENTS"][$i]["USERNAME"] = $usernames[$i]["USERNAME"];
        }

        $data["CONTENTS"] = Database::executeQuery("SELECT * FROM UNLOCKABLE_CONTENT WHERE IDEA_ID = $idea_id");

        return $data;
    }
}
