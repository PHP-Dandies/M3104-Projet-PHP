<?php

const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASS = "root";
const DB_NAME = "eevent_io";

class database
{
    private static $connection;

    /**
     * @throws Exception
     */
    public static function open_connection(): void
    {
        self::$connection = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS)
        or throw new Exception('Erreur connexion au serveur : ' . mysqli_connect_error(), 1);
        mysqli_select_db(self::$connection, DB_NAME)
        or throw new Exception('Erreur connexion au serveur : ' . mysqli_connect_error(), 1);
    }

    // for inserting, updating and deleting
    /**
     * @throws Exception
     */
    public static function execute_update($query): bool
    {
        if (!self::$connection) {
            self::open_connection();
        }

        //var_dump(self::$connection);

        return mysqli_query(self::$connection, $query);
    }

    // for any other query
    /**
     * @throws Exception
     */
    public static function execute_query($query): array
    {
        if (preg_match_all('/INSERT|UPDATE|DELETE/i', $query) > 0) {
            self::close_connection();
            throw new \RuntimeException("For any modification of the base use database::mysqli_update");
        }

        if (!self::$connection) {
            self::open_connection();
        }

        $db_result = mysqli_query(self::$connection, $query);

        if (!$db_result) {
            self::close_connection();
            throw new \RuntimeException('Something went wrong with query : ' . $query . PHP_EOL, 2);
        }

        $obj_array = array();

        while ($row = mysqli_fetch_assoc($db_result)) {
            $obj_array[] = $row;
        }

        return $obj_array;
    }

    /**
     * @throws Exception
     */
    public static function close_connection(): void
    {
        if (!self::$connection) {
            self::open_connection();
        }

        mysqli_close(self::$connection);
    }
}