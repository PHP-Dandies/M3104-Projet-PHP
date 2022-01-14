<?php

include('../Utils/AutoLoader.php');

class JuryController {
    /**
     * @throws Exception
     */
    public function read(): void
    {
        $ideas = JuryModel::getIdeas();
        $viewName = 'ReadAll';

        if (empty($ideas)) {
            $viewName = 'NoCampaign';
        }

        ViewHelper::display(
            $this,
            $viewName,
            $ideas
        );
    }

    /**
     * @throws Exception
     */
    public function readOne($id) : void {
        $idea = JuryModel::getIdea($id);
        ViewHelper::display(
            $this,
            'ReadOne',
            $idea
        );
    }
}