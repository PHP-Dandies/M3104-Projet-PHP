<?php

require_once('../Utils/Database.php');

class IdeaModel extends AbstractModel{

    private int $ID;
    private string $title;
    private string $description;
    private int $goal;
    private int $totalVotes;
    private int $totalPoints;
    private string $picture;
    private int $userID;
    private int $campaignID;

    public static function ideaExists($ideaID) : bool {
        return Database::executeCount("SELECT COUNT(*) TOTAL FROM IDEA WHERE IDEA_ID = $ideaID");
    }

    /**
     * @throws Exception
     */
    public static function fetchIdeas(int $campaignID) : ?array {
        return Database::executeQuery("SELECT * FROM `idea` WHERE CAMPAIGN_ID = "
            . $campaignID . " ORDER BY TOTAL_POINTS DESC;");
    }

    public static function fetchTheIdea($ideaID) : array {
        return database::executeQuery("SELECT * FROM IDEA WHERE IDEA_ID = $ideaID")[0];
    }

    /**
     * @throws Exception
     */
    public static function fetchIdea($ideaID) : array {
        $data = array();

        $data["IDEA"] = Database::executeQuery("SELECT * FROM IDEA WHERE IDEA_ID = $ideaID")[0];

        $data["USER"] = Database::executeQuery("SELECT USER.USER_ID, USER.USERNAME FROM USER, IDEA WHERE USER.USER_ID = IDEA.USER_ID")[0];

        $data["COMMENTS"] = Database::executeQuery("SELECT * FROM COMMENT WHERE IDEA_ID = $ideaID");

        $usernames = Database::executeQuery("SELECT USERNAME FROM USER, COMMENT WHERE USER.USER_ID = COMMENT.USER_ID");
        for ($i = 0, $iMax = count($data["COMMENTS"]); $i < $iMax; ++$i) {
            $data["COMMENTS"][$i]["USERNAME"] = $usernames[$i]["USERNAME"];
        }

        $data["CONTENTS"] = Database::executeQuery("SELECT * FROM UNLOCKABLE_CONTENT WHERE IDEA_ID = $ideaID");

        return $data;
    }

    /**
     * @throws Exception
     */
    public static function deleteIdea(int $ideaID): bool
    {
        return Database::executeUpdate("
            DELETE FROM IDEA
            WHERE IDEA_ID = $ideaID;
        ");
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     */
    public function setID(int $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getGoal(): int
    {
        return $this->goal;
    }

    /**
     * @param int $goal
     */
    public function setGoal(int $goal): void
    {
        $this->goal = $goal;
    }

    /**
     * @return int
     */
    public function getTotalVotes(): int
    {
        return $this->totalVotes;
    }

    /**
     * @param int $totalVotes
     */
    public function setTotalVotes(int $totalVotes): void
    {
        $this->totalVotes = $totalVotes;
    }

    /**
     * @return int
     */
    public function getTotalPoints(): int
    {
        return $this->totalPoints;
    }

    /**
     * @param int $totalPoints
     */
    public function setTotalPoints(int $totalPoints): void
    {
        $this->totalPoints = $totalPoints;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return int
     */
    public function getUserID(): int
    {
        return $this->userID;
    }

    /**
     * @param int $userID
     */
    public function setUserID(int $userID): void
    {
        $this->userID = $userID;
    }

    /**
     * @return int
     */
    public function getCampaignID(): int
    {
        return $this->campaignID;
    }

    /**
     * @param int $campaignID
     */
    public function setCampaignID(int $campaignID): void
    {
        $this->campaignID = $campaignID;
    }

}
