<?php

require_once('../Utils/AutoLoader.php');

class OrganizerController {
    /**
     * @throws Exception
     */
    public function read(): void {
        $campaign_id = -1;
        $campaigns = CampaignModel::fetchCampaigns();
        foreach ($campaigns as $campaign) {
            if ($campaign['Status'] == 'running') {
                $campaign_id = $campaign['ID'];
            }
        }
        if ($campaign_id == -1) {header('Location: /'); die();}
        $campaign_id = CampaignModel::fetchRunningCampaign();
        $ideas = IdeaModel::fetchIdeas($campaign_id);
        $my_ideas = array();

        if (isset($_SESSION["id"])) {
            foreach ($ideas as $idea) {
                if ($idea['USER_ID'] == $_SESSION["id"]) {
                    $my_ideas[] = $idea;
                }
            }
        } else {
            header('Location: /');
            die();
        }

        ViewHelper::display(
            $this,
            'Read',
            $my_ideas
        );
    }
}