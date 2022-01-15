<?php

require_once('../Utils/AutoLoader.php');

class PublicController
{
    /**
     * @throws Exception
     */
    public function readIdeas (){
     $campaign_id = campaignModel::fetchRunningCampaign();
     $ideas = IdeaModel::fetchIdeas($campaign_id);
     ViewHelper::display(
         $this,
         'ReadAll',
         $ideas
     );
 }

    /**
     * @throws Exception
     */
    public function readIdea ($idea_id){
     $idea = IdeaModel::fetchIdea($idea_id);
     ViewHelper::display(
         $this,
         'ReadOne',
         $idea
     );

 }
}