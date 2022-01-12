<?php
include('../Utils/AutoLoader.php');

class ErrorController {
    /**
     * @throws Exception
     */
    public function error404() : void{
        $campaigns = CampaignModel::get_campaigns();
        ViewHelper::display(
            $this,
            '404',
            $campaigns
        );
    }
}