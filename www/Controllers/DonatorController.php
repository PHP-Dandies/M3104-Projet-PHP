<?php

class DonatorController
{
    public function userVote(): void
    {
        $errors = array();
        $pts = (int)$_POST["pts"];
        $ideaID = $_POST["ideaID"];
        $totalPointsUser = UserModel::fetchUser($_SESSION['id'])['POINTS'];
        $totalPointsIdea = IdeaModel::fetchTheIdea($ideaID)['TOTAL_POINTS'];
        $ideaGoal = IdeaModel::fetchTheIdea($ideaID)['GOAL'];

        if ($pts > $totalPointsUser) {
            $errors['notEnough'] = 'Vous ne possedez pas le nombre de points suffisants !';
            $controller = new PublicController();
            $controller->readIdeaAgain($ideaID,$errors);
        }
        elseif ($totalPointsIdea + $pts > $ideaGoal) {
            $errors['toomuchpoints'] = 'Vous ne pouvez pas donner plus de points que nécessaire à cette idée !';
            $controller = new PublicController();
            $controller->readIdeaAgain($ideaID,$errors);
        }
        else {
            Database::executeUpdate("UPDATE IDEA SET TOTAL_POINTS = TOTAL_POINTS + $pts WHERE IDEA_ID = " . $ideaID);
            Database::executeUpdate("UPDATE USER SET POINTS = POINTS - $pts WHERE USER_ID = " . $_SESSION['id']);

            $controller = new PublicController();
            $controller->readIdea($ideaID);
            }
    }


}