<?php

class DonatorController
{
    /**
     * Verifies au moment de la création du controller, si l'utilisateur à les droits d'administrateur
     * @throws Exception
     */
    public function __construct() {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== DONOR) {
            $controller = new ErrorController();
            $controller->error404('/');
            die();
        }
    }

    /**
     * @throws Exception
     */
    public function userVote(): void
    {
        $errors = array();
        $pts = (int)$_POST["pts"];
        $ideaID = $_POST["ideaID"];
        $totalPointsUser = UserModel::fetchUser($_SESSION['id'])['POINTS'];
        $totalPointsIdea = IdeaModel::fetchTheIdea($ideaID)['TOTAL_POINTS'];
        $ideaGoal = IdeaModel::fetchTheIdea($ideaID)['GOAL'];

        if ($pts > $totalPointsUser) {
            $errors['notenough'] = 'Vous ne possedez pas le nombre de points suffisant !';

        }
        elseif ($totalPointsIdea + $pts > $ideaGoal) {
            $errors['toomuchpoints'] = 'Vous ne pouvez pas donner plus de points que nécessaire à cette idée !';
        }
        else {
            Database::executeUpdate("UPDATE IDEA SET TOTAL_POINTS = TOTAL_POINTS + $pts WHERE IDEA_ID = " . $ideaID);
            Database::executeUpdate("UPDATE USER SET POINTS = POINTS - $pts WHERE USER_ID = " . $_SESSION['id']);
            }

        $idea = IdeaModel::fetchAllInfoFromIdea($ideaID);
        $idea['errors'] = $errors;
        ViewHelper::display(
            $this,
            'readOne',
            array('errors' => $errors,
                'idea' => $idea)
        );
    }
}