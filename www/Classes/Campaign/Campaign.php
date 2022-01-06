<?php

const ID = 'CAMPAIGN_ID';
const NAME = 'TITLE';
const BEG_DATE = 'BEG_DATE';
const END_DATE = 'END_DATE';

class Campaign {
    private string $id;
    private string $name;
    private string $beg_date;
    private string $end_date;

    public function __construct(array $campaign_object) {
        $this->id = $campaign_object[ID];
        $this->name = $campaign_object[NAME];
        $this->beg_date = $campaign_object[BEG_DATE];
        $this->end_date = $campaign_object[END_DATE];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBegDate(): string
    {
        return $this->beg_date;
    }

    /**
     * @param string $beg_date
     */
    public function setBegDate(string $beg_date): void
    {
        $this->beg_date = $beg_date;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }

    /**
     * @param string $end_date
     */
    public function setEndDate(string $end_date): void
    {
        $this->end_date = $end_date;
    }
}