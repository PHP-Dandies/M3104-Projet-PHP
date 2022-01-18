<?php

require_once('../Utils/AutoLoader.php');

class CampaignController extends AbstractController {
    /**
     * @throws Exception
     */
    public function read() : void{
        $campaigns = CampaignModel::fetchcampaigns();
        ViewHelper::display(
            $this,
            'Read',
            $campaigns
        );
    }
    //verifier que la derniere date est terminé dans la base de donée

    public function create(): void
    {
        ViewHelper::display(
            $this,
            'Create',
            array()
        );
    }
}