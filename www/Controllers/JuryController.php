<?php

include('../Utils/AutoLoader.php');

class JuryController {
    /**
     * @throws Exception
     */

    public function __construct()
    {
        $controller = new ErrorController();
        if(!isset($_SESSION['role']) || $_SESSION['role'] != 'jury'){
            $controller->error404('/');
            die();
        }
    }

    public function read(): void
    {
        $campaignInDelib = CampaignModel::fetchCampaignInDeliberation();
        if (empty($campaignInDelib)) {
            ViewHelper::display(
                $this,
                'Deliberation',
                array()
            );
        }

        $ideas = IdeaModel::fetchIdeasDelib();
        $viewName = 'Deliberation';

        if (empty($ideas)) {
            $viewName = 'CampaignList'; //CampaignList est placé dans Views/Campagin et non plus dans View/Jury
        }

        ViewHelper::display(
            $this,
            $viewName,
            $ideas
        );
    }

    public function juryVote($id){
        IdeaModel::acceptIdea($id);
        header('Location: /jury');
        exit();
    }

    /**
     * @throws Exception
     */
    public function readOne($id) : void {
        $idea = IdeaModel::fetchAllInfoFromIdea($id);
        if(empty($idea)) {
            $controller = new ErrorController();
            $controller->error404('');
            exit();
        }
        ViewHelper::display(
            $this,
            'ReadOne',
            array(
                'IDEA' => $idea
            )
        );
    }
}