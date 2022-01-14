<?php

require_once('../Utils/AutoLoader.php');

class IdeaController {
    /**
     * @throws Exception
     */
    public function readAll($campaign_id): void {
        $ideas = IdeaModel::get_ideas($campaign_id);
        ViewHelper::display(
            $this,
            'ReadAll',
            $ideas
        );
    }

    /**
     * @throws Exception
     */
    public function read($idea_id): void
    {
        $ideas = IdeaModel::get_idea($idea_id);
        ViewHelper::display(
            $this,
            'ReadOne',
            $ideas
        );
    }

    public function create(): void
    {
        ViewHelper::display(
            $this,
            'Create',
            array()
        );
    }
}
