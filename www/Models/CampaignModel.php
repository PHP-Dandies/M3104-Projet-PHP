<?php

require_once('../Utils/Database.php');

class CampaignModel extends AbstractModel
{
    private int $ID;
    private string $title;
    private string $begDate;
    private string $endDate;
    private string $delibEndDate;
    private string $status;

    /**
     * @throws Exception
     */
    public static function fetchCampaigns(): array
    {
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
            . "DELIB_END AS DelibEndDate, TITLE AS Title, STATUS AS Status FROM CAMPAIGN WHERE CAMPAIGN_ID = $campaignID");
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
    public function getBegDate(): string
    {
        return $this->begDate;
    }

    /**
     * @param string $begDate
     */
    public function setBegDate(string $begDate): void
    {
        $this->begDate = $begDate;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
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

    /**
     * @return string
     */
    public function getDelibEndDate(): string
    {
        return $this->delibEndDate;
    }

    /**
     * @param string $delibEndDate
     */
    public function setDelibEndDate(string $delibEndDate): void
    {
        $this->delibEndDate = $delibEndDate;
    }

    /**
     * @return bool
     */
    public function isOver(): bool
    {
        return $this->status === 'over';
    }

    /**
     * @return bool
     */
    public function isRunning(): bool
    {
        return $this->status === 'running';
    }

    /**
     * @return bool
     */
    public function isInDeliberation(): bool
    {
        return $this->status === 'deliberation';
    }

    /**
     * @return bool
     */
    public function isScheduled(): bool
    {
        return $this->status === 'scheduled';
    }
}