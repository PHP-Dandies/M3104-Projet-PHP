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
    public static function get_ideas($campaign_id) : array {
        $query = 'SELECT * FROM IDEA WHERE CAMPAIGN_ID = ' . $campaign_id;
        return Database::executeQuery($query);
    }
}
