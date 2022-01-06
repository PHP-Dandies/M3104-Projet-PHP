<?php

const ID = 'CAMPAIGN_ID';
const NAME = 'TITLE';
const BEG_DATE = 'BEG_DATE';
const END_DATE = 'END_DATE';

class campaign {
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
    public function get_id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function get_name(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function set_name(mixed $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function get_beg_date(): string
    {
        return $this->beg_date;
    }

    /**
     * @param string $beg_date
     */
    public function set_beg_date(string $beg_date): void
    {
        $this->beg_date = $beg_date;
    }

    /**
     * @return string
     */
    public function get_end_date(): string
    {
        return $this->end_date;
    }

    /**
     * @param string $end_date
     */
    public function set_end_date(string $end_date): void
    {
        $this->end_date = $end_date;
    }
}