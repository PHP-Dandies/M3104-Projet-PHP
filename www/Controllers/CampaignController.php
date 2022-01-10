<?php

require_once('../Utils/AutoLoader.php');

class CampaignController {
    /**
     * @throws Exception
     */
    public function read() {
        $campaigns = CampaignModel::get_campaigns();
        ViewHelper::display(
            $this,
            'Read',
            $campaigns
        );
    }
}