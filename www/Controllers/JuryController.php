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
            header('Location: /');
            die();
        }

        ViewHelper::display(
            $this,
            $viewName,
            $ideas
        );
    }

    public function juryVote($id){
        if(UserModel::fetchPoint() != 0)
        {
            UserModel::removePoint();
            IdeaModel::acceptIdea($id);
            header('Location: /jury');
            exit();
        }
        else
        {
            ViewHelper::display(
                $this,
                'ReadOne',
                array(
                    'ERROR' => 'Vous avez utilisé tous vos votes, merci de votre participation !'
                )
            );
        }

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