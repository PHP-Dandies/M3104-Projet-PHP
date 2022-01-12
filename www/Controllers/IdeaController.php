<?php

require_once('../Utils/AutoLoader.php');

class IdeaController {
    /**
     * @throws Exception
     */
    public function read($campaign_id) {
        'SELECT * FROM IDEA WHERE CAMPAIGN_ID = ' . $campaign_id;
        $ideas = IdeaModel::get_ideas($campaign_id);
        ViewHelper::display(
            $this,
            'Read',
            $ideas
        );
    }

    public function create() {
        ViewHelper::display(
            $this,
            'Create',
            array()
        );
    }
}
