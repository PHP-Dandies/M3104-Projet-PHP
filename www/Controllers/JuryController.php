<?php


class JuryController {
    /**
     * @throws Exception
     */
    public function read(): void
    {
        $ideas = JuryModel::getIdeas();
        $viewName = 'Deliberation';

        if (empty($ideas)) {
            $viewName = 'JuryView';
        }

        ViewHelper::display(
            $this,
            $viewName,
            $ideas
        );
    }

    /**
     * @throws Exception
     */
    public function readOne($id) : void {
        $idea = JuryModel::getIdea($id);
        var_dump($idea);
        ViewHelper::display(
            $this,
            'ReadOne',
            $idea
        );
    }
}