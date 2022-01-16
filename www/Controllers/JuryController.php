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
        $campaign = $_POST['campaignID'];
        $a = JuryModel::getIdeas();  //Compter les IDEA ID si il y en a aucune alors le numéro dans l'url s'est trompé
        if(JuryModel::getAllIdeas($campaign))
        {
            JuryModel::acceptIdea($id);
            header('Location: /jury');
            exit();
        }
        else {
            $controller = new ErrorController();
            $controller->error404('/');
            die();
        }
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