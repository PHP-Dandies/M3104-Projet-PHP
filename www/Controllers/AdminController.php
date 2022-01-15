<?php

require_once('../Utils/AutoLoader.php');
class AdminController
{
    /**
     * Displays all the campaigns
     * @return void
     * @throws Exception
     */
    public function readCampaigns() : void {
        $campaigns = CampaignModel::fetchCampaigns();
        ViewHelper::display(
            $this,
            'ReadCampaigns',
            $campaigns
        );
    }

    /**
     * Shows all ideas of a campaign
     * @param $campaignID int the id of the campaign which the ideas belong to
     * @return void
     * @throws Exception
     */
    public function readIdeas(int $campaignID) : void {
        $campaign = IdeaModel::fetchIdeas($campaignID);

        ViewHelper::display(
            $this,
            'ReadIdeas',
            $campaign
        );
    }

    /**
     * Show the requested id specified by
     * @param int $ideaID id of the idea to be shown
     * @throws Exception
     */
    public function readIdea(int $ideaID) : void {
        $campaign = IdeaModel::fetchIdea($ideaID);

        ViewHelper::display(
            $this,
            'ReadIdea',
            $campaign
        );
    }

    /**
     * Shows the screen to create a campaign
     * @return void
     */
    public function createCampaign() : void {
        ViewHelper::display(
            $this,
            'CreateCampaign',
            array()
        );
    }

    /**
     * @param $ideaID
     * @return void
     */
    public function readModifyIdea($ideaID) : void {
        ViewHelper::display(
            $this,
            'M'
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function readUsers() : void {
        $users = UserModel::fetchAll();
        ViewHelper::display(
            $this,
            'ReadUsers',
            $users
        );
    }

    public function readIndex() : void {
        ViewHelper::display(
            $this,
            'Index',
            array()
        );
    }
}