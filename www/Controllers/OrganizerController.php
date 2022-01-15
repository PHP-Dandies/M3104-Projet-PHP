<?php

include('../Utils/AutoLoader.php');

class OrganizerController {
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
    public function create() : void {
        ViewHelper::display(
            $this,
            'Create',
            array()
        );
    }

    public function modify() : void {
        ViewHelper::display(
            $this,
            'Edit',
            array()
        );
    }
}