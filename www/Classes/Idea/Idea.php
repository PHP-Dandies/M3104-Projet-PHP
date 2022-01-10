<?php

class Idea
{
    private int $idea_id;
    private string $title;
    private string $description;
    private int $goal;
    private int $total_votes
    private int $total_points;
    private string $picture;
    private int $user_id;
    private int $campaign_id;/**
 * @param $idea_id
 * @param $title
 * @param $description
 * @param $goal
 * @param $picture
 * @param $user_id
 * @param $campaign_id
 */public function __construct($idea_id, $title, $description, $goal, $picture, $user_id, $campaign_id)
{
    $this->idea_id = $idea_id;
    $this->title = $title;
    $this->description = $description;
    $this->goal = $goal;
    $this->picture = $picture;
    $this->user_id = $user_id;
    $this->campaign_id = $campaign_id;
    $this->total_points = 0;
    $this->total_votes = 0;
}/**
 * @return int
 */
public function getIdeaId(): int
{
    return $this->idea_id;
}/**
 * @param int $idea_id
 */
public function setIdeaId(int $idea_id): void
{
    $this->idea_id = $idea_id;
}/**
 * @return string
 */
public function getTitle(): string
{
    return $this->title;
}/**
 * @param string $title
 */
public function setTitle(string $title): void
{
    $this->title = $title;
}/**
 * @return string
 */
public function getDescription(): string
{
    return $this->description;
}/**
 * @param string $description
 */
public function setDescription(string $description): void
{
    $this->description = $description;
}/**
 * @return int
 */
public function getGoal(): int
{
    return $this->goal;
}/**
 * @param int $goal
 */
public function setGoal(int $goal): void
{
    $this->goal = $goal;
}/**
 * @return int
 */
public function getTotalVotes(): int
{
    return $this->total_votes;
}/**
 * @param int $total_votes
 */
public function setTotalVotes(int $total_votes): void
{
    $this->total_votes = $total_votes;
}/**
 * @return int
 */
public function getTotalPoints(): int
{
    return $this->total_points;
}/**
 * @param int $total_points
 */
public function setTotalPoints(int $total_points): void
{
    $this->total_points = $total_points;
}/**
 * @return string
 */
public function getPicture(): string
{
    return $this->picture;
}/**
 * @param string $picture
 */
public function setPicture(string $picture): void
{
    $this->picture = $picture;
}/**
 * @return int
 */
public function getUserId(): int
{
    return $this->user_id;
}/**
 * @param int $user_id
 */
public function setUserId(int $user_id): void
{
    $this->user_id = $user_id;
}/**
 * @return int
 */
public function getCampaignId(): int
{
    return $this->campaign_id;
}/**
 * @param int $campaign_id
 */
public function setCampaignId(int $campaign_id): void
{
    $this->campaign_id = $campaign_id;
}





}