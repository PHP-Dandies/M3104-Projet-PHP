<?php

class HomeController
{
    /**
     * @throws Exception
     */
    public function read(): void
    {
        $ideas = HomeModel::getIdeas();
        $viewName = 'ReadAll';

        if (empty($ideas)) {
            echo'ya rien wesh';
        }

        ViewHelper::display(
            $this,
            $viewName,
            $ideas
        );
    }
}