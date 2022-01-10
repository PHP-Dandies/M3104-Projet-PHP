<?php

class IdeaModel
{
    /**
     * @throws Exception
     */
    public static function get_ideas(): array {
        $query = 'SELECT * FROM IDEAS;';
        return Database:: executeQuery($query);
        }

    /**
     * @throws Exception
     */
    public static function get_idea(int $id): ?Idea {
        $ideas = self::get_ideas();
        foreach ($ideas as $idea){
            if ($idea->getIdeaId = $id){
                return $idea;
            }
        }
        return null;
    }


}