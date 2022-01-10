<?php

class User
{
    public int $id;
    public string $username;
    public string $password;
    public string $role;
    public int $availablePoints;
    public string $email;

    function __construct($id, $username, $password, $role, $availablePoints, $email){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->availablePoints = $availablePoints;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getAvailablePoints(): int
    {
        return $this->availablePoints;
    }

    public function setAvailablePoints(int $availablePoints): void
    {
        $this->availablePoints = $availablePoints;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}