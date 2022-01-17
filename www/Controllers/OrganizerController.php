<?php

class OrganizerController {

    /**
     * @throws Exception
     */
    public function __construct() {
        if (!isset($_SESSION["id"]) || $_SESSION["role"] === 'ORGANISATEUR') {
            $controller = new ErrorController();
            $controller->error404('/');
            die();
        }
    }
    /**
     * @throws Exception
     */
    public function read(): void {
        // récupérer la campagne en cours, s'il n'y en a pas, montrer la date de la prochaine sinon la montrer
        $my_ideas = array();
        $campaign = array();
        $runningCampaign = CampaignModel::fetchRunningCampaign();
        if (!empty($runningCampaign)) {
            $my_ideas = IdeaModel::fetchUserIdeas($_SESSION["id"]);
            $campaign = CampaignModel::fetchCampaign($runningCampaign["CAMPAIGN_ID"]);
        } else {
            $campaign = CampaignModel::fetchScheduledCampaigns();
            if (!empty($campaign)) {
                $campaign = $campaign[0];
            }
        }

        ViewHelper::display(
            $this,
            'Read',
            array(
                'campaign' => $campaign,
                'ideas' => $my_ideas
            )
        );
    }
}