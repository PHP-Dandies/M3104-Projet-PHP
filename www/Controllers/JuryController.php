<?php

include('../Utils/AutoLoader.php');

class JuryController {
    /**
     * @throws Exception
     */

    public function __construct()
    {
        if(!isset($_SESSION['role']) || $_SESSION['role'] != 'jury'){
            $controller = new ErrorController();
            $controller->error404('/');
            die();
        }
    }


    public function read(): void
    {
        $ideas = JuryModel::getIdeas();
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
        JuryModel::acceptIdea($id);
        header('Location: /jury');
        exit();
    }

    /**
     * @throws Exception
     */
    public function readOne($id) : void {
        $idea = JuryModel::getIdea($id);
        ViewHelper::display(
            $this,
            'ReadOne',
            $idea
        );
    }
}