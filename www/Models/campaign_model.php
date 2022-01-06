<?php

include_once ('../Utils/database.php');

class campaign_model {
    /**
     * @throws Exception
     */
    public function get_campaigns() : array {
        $query = 'SELECT * FROM CAMPAIGNS;';
        return database::execute_query($query);
    }
}