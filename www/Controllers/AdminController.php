<?php

require_once('../Utils/AutoLoader.php');
class AdminController extends AbstractController
{
    /**
     * Displays all the campaigns
     * @return void
     * @throws Exception
     */
    public function readCampaigns() : void {
        $campaigns = CampaignModel::fetchCampaigns();
        ViewHelper::display(
            $this,
            'ReadCampaigns',
            $campaigns
        );
    }

    /**
     * Shows all ideas of a campaign
     * @param $campaignID int the id of the campaign which the ideas belong to
     * @return void
     * @throws Exception
     */
    public function readIdeas(int $campaignID) : void {
        $campaign = IdeaModel::fetchIdeas($campaignID);

        ViewHelper::display(
            $this,
            'ReadIdeas',
            $campaign
        );
    }

    /**
     * Show the requested id specified by
     * @param int $ideaID id of the idea to be shown
     * @throws Exception
     */
    public function readIdea(int $ideaID) : void {
        $campaign = IdeaModel::fetchIdea($ideaID);

        ViewHelper::display(
            $this,
            'ReadIdea',
            $campaign
        );
    }

    /**
     * Shows the screen to create a campaign
     * @return void
     */
    public function modifyCampaign() : void {
        $errors = array();
        if (!empty($_POST)) {
            /** @var CampaignModel $campaign */
            $campaign = $this->mapDataPostToClass('CampaignModel');
            if (date_create($campaign->getBegDate()) > date_create($campaign->getEndDate())
                || date_create($campaign->getBegDate()) > date_create($campaign->getDelibEndDate())) {
                $errors['datebeg'] = 'La date de début ne peux pas être supérieure à la date de fin ou de délibération';
            }
            if (date_create($campaign->getDelibEndDate()) < date_create($campaign->getEndDate())
                || date_create($campaign->getDelibEndDate()) < date_create($campaign->getBegDate())) {
                $errors['dateenddelib'] = 'La date de délibétation ne peux pas'
                    . ' être inférieure à la date de fin ou de délibération';
            }
            if (empty($errors)) {
                CampaignModel::modifyCampaign($campaign);
            }
        } else {
            throw new \http\Exception\RuntimeException('bad acess');
        }
        ViewHelper::display(
            $this,
            'EditCampaign',
            array(
                'errors' => $errors,
                'data' => $campaign
            )
        );
    }

    /**
     * @param $ideaID
     * @return void
     * @throws Exception
     */
    public function readModifyIdea($ideaID) : void {
        $idea = IdeaModel::fetchIdea($ideaID);
        ViewHelper::display(
            $this,
            '',
            $idea
        );
    }

    /**
     * @throws Exception
     */
    public function readModifyCampaign($campaignID) : void {
        $campaign = CampaignModel::fetchCampaign($campaignID);
        ViewHelper::display(
            $this,
            'EditCampaign',
            $campaign
        );
    }

    /**
     * @return void
     * @throws Exception
     */
    public function readUsers() : void {
        $users = UserModel::fetchAll();
        ViewHelper::display(
            $this,
            'ReadUsers',
            $users
        );
    }

    public function readIndex() : void {
        ViewHelper::display(
            $this,
            'Index',
            array()
        );
    }
}