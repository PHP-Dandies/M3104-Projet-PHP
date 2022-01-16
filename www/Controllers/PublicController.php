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

        $campaign = campaignModel::fetchRunningCampaign();

        if (empty($campaign)) {
            $next_campaigns = CampaignModel::fetchScheduledCampaigns();
            if (empty($next_campaigns)) {
                $data['option'] = 'no_campaigns_scheduled';
            }
            ViewHelper::display(
                $this,
                'ReadAll',
                array(
                    'next_campaign' => $next_campaigns[0],
                    'last_campaign_results' => IdeaModel::fetchRealizedIdeas(CampaignModel::fetchLastFinishedCampaign()['$CAMPAIGN_ID']),
                    'option' => 'next_campaign'
                )
            );
            return;
        }

        $campaign_id = $campaign['CAMPAIGN_ID'];

        $ideas = IdeaModel::fetchIdeas((int)$campaign_id);

        ViewHelper::display(
            $this,
            'ReadAll',
            array(
                'option' => 'none',
                'ideas' => $ideas,
            )
        );
    }

    /**
     * @throws Exception
     */
    public function readIdea($idea_id)
    {
        $idea = IdeaModel::fetchIdea($idea_id);
        ViewHelper::display(
            $this,
            'ReadOne',
            $idea
        );

    }

}