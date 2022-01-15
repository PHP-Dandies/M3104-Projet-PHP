<?php

class HomeController
{
    /**
     * @throws Exception
     */
    public function read(): void
    {
        $ideas = HomeModel::getIdeas();
        $viewName = 'ReadAll';

        if (empty($ideas)) {
            $viewName = 'NoActiveCampaignView';
        }

        ViewHelper::display(
            $this,
            $viewName,
            $ideas
        );
    }
}