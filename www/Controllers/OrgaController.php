<?php

require_once('../Utils/AutoLoader.php');

class OrgaController {
    /**
     * @throws Exception
     */
    public function readMine(): void {
        $campaign_id = CampaignModel::get_running_campaing();
        $ideas = IdeaModel::get_ideas($campaign_id);
        $my_ideas = array();
        if (isset($_SESSION["UID"])) {
            foreach ($ideas as $idea) {
                if ($idea['USER'] == $_SESSION['UID']) {
                    $my_ideas[] = $idea;
                }
            }
        } else {
            header('Location: /');
        }

        ViewHelper::display(
            $this,
            'ReadMineView',
            $my_ideas
        );
    }
}