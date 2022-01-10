<?php

require_once('../Utils/AutoLoader.php');

class IdeaController {
    /**
     * @throws Exception
     */
    public function read($campaign_id) {
        $ideas = IdeaModel::get_ideas($campaign_id);
        ViewHelper::display(
            $this,
            'Read',
            $ideas
        );
    }
}
