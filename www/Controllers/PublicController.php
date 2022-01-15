<?php

class PublicController
{
 public function readIdeas ($campaign_id){
     $ideas = IdeaModel::fetchIdeas($campaign_id);
     ViewHelper::display(
         $this,
         'ReadAll',
         $ideas
     );
 }


 public function readIdea ($idea_id){
     $idea = IdeaModel::fetchIdea($idea_id);
     ViewHelper::display(
         $this,
         'ReadOne',
         $idea
     );

 }
}