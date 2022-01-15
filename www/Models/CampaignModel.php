<?php

require_once('../Utils/Database.php');

class CampaignModel extends AbstractModel {
    private int $ID;
    private string $title;
    private DateTime $begDate;
    private DateTime $endDate;
    private DateTime $delibDate;
    private string $status;

    /**
     * @throws Exception
     */
    public static function fetchCampaigns() : array {
        return Database::executeQuery("SELECT * FROM CAMPAIGN;");
    }

    /**
     * @param int $campaignID id of the campaign to extract from the database
     * @return array
     * @throws Exception
     */
    public static function fetchCampaign(int $campaignID): array
    {
        return Database::executeQuery("SELECT CAMPAIGN_ID AS ID, BEG_DATE AS BegDate, END_DATE as EndDate,"
            . "DELIB_END AS DelibEnd, TITLE AS Title, STATUS AS Status FROM CAMPAIGN WHERE CAMPAIGN_ID = $campaignID");
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
     * @return DateTime
     */
    public function getBegDate(): DateTime
    {
        return $this->begDate;
    }

    /**
     * @param DateTime $begDate
     */
    public function setBegDate(DateTime $begDate): void
    {
        $this->begDate = $begDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime $endDate
     */
    public function setEndDate(DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return DateTime
     */
    public function getDelibDate(): DateTime
    {
        return $this->delibDate;
    }

    /**
     * @param DateTime $delibDate
     */
    public function setDelibDate(DateTime $delibDate): void
    {
        $this->delibDate = $delibDate;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}