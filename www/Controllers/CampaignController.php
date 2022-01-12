<?php

require_once('../Utils/AutoLoader.php');

class CampaignController {
    /**
     * @throws Exception
     */
    public function read() : void{
        $campaigns = CampaignModel::get_campaigns();
        ViewHelper::display(
            $this,
            'Read',
            $campaigns
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