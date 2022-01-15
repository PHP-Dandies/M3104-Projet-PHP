<?php

require_once('../Utils/AutoLoader.php');

class OrgaController {
    /**
     * @throws Exception
     */
    public function readMine(): void {
        $campaign_id = -1;
        $campaigns = CampaignModel::fetchCampaigns();
        foreach ($campaigns as $campaign) {
            if ($campaign['STATUS'] == 'running') {
                $campaign_id = $campaign['CAMPAIGN_ID'];
            }
        }
        if ($campaign_id == -1) {header('Location: /'); die();}
        $ideas = IdeaModel::fetchIdeas($campaign_id);
        $my_ideas = array();

        if (isset($_SESSION["ID"])) {
            foreach ($ideas as $idea) {
                if ($idea['USER_ID'] == $_SESSION["ID"]) {
                    $my_ideas[] = $idea;
                }
            }
        } else {
            header('Location: /');
            die();
        }

        ViewHelper::display(
            $this,
            'ReadMineView',
            $my_ideas
        );
    }
}