<?php

require_once('../Utils/AutoLoader.php');

class PublicController
{
    /**
     * @throws Exception
     */
    public function readIdeas()
    {
        $data = array();

        $campaign = CampaignModel::fetchRunningCampaign();
        $lastCampaign = CampaignModel::fetchLastFinishedCampaign();
        $campaignInDelib = CampaignModel::fetchCampaignInDeliberation();

        if (empty($campaign)) {
            $next_campaigns = CampaignModel::fetchScheduledCampaigns();
            if (empty($next_campaigns)) {
                $data['option'] = 'no_campaigns_scheduled';
            } else {
                $data['next_campaign'] = $next_campaigns[0];
            }
        } else {
            $campaign_id = $campaign['CAMPAIGN_ID'];
            $data['option'] = 'none';
            $data['ideas'] = IdeaModel::fetchIdeas((int) $campaign_id);
        }
        if (!empty($lastCampaign)) {
            $data['last_campaign_result'] = IdeaModel::fetchRealizedIdeas($lastCampaign['CAMPAIGN_ID']);
        }
        if (!empty($campaignInDelib)) {
            $data['ideas_delib'] = IdeaModel::fetchIdeas($campaignInDelib['CAMPAIGN_ID']);
        }
        ViewHelper::display(
            $this,
            'ReadAll',
            $data
        );
    }

    /**
     * @throws Exception
     */
    public function readIdea($idea_id): void
    {
        $idea = IdeaModel::fetchAllInfoFromIdea($idea_id);
        if (empty($idea)) {
            $controller = new ErrorController();
            $controller->error404('/');
        } else {
            if (IdeaModel::isOldCampaign($idea_id)) {
                $idea["STATUS"] = 'over';
            } elseif (IdeaModel::isInDeliberation($idea_id)) {
                $idea["STATUS"] = 'deliberation';
            } else {
                $idea["STATUS"] = 'running';
            }

            ViewHelper::display(
                $this,
                'ReadOne',
                $idea
            );
        }
    }

}