<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);

class UserModel
{
    private int $userID;
    private string $username;
    private string $password;
    private string $role;
    private string $email;
    private int $points;

    /**
     * Returns a list of all users
     * @return array
     * @throws Exception
     */
    public static function fetchAll() : array {
        return Database::executeQuery("SELECT * FROM USER");
    }

    function getUserWithId($id): User
    {
        $query = database::executeQuery("SELECT * FROM USER WHERE USER_ID='$id';")[0];
        $user = new User($query['USER_ID'],
            $query['USERNAME'],
            $query['PASSWORD'],
            $query['ROLE'],
            $query['AVAILABLE_POINTS'],
            $query['EMAIL']);
        return $user;
    }

    function getUserByUsername ($username): User
    {
        $query = database::executeQuery("SELECT * FROM USER WHERE USERNAME = '$username' ;")[0];
        $user = new User($query['USER_ID'],
            $query['USERNAME'],
            $query['PASSWORD'],
            $query['ROLE'],
            $query['AVAILABLE_POINTS'],
            $query['EMAIL']);
        return $user;

    }

    function isLogin ($username): bool
    {
        return database::executeCount("SELECT COUNT(*) FROM USER WHERE USERNAME = '$username';") >= 1;
    }

    function isPassword ($username, $password): bool
    {
        return password_verify($password, database::executeQuery("SELECT PASSWORD FROM USER WHERE USERNAME='$username';")[0]["PASSWORD"]);
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
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $points
     */
    public function setPoints(int $points): void
    {
        $this->points = $points;
    }
}