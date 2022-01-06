<?php

class Globals
{
    static private string $projectDir;

    public static function getProjectDir(): string
    {
        if (!isset(self::$projectDir)) {
            self::$projectDir = dirname(__DIR__);
        }
        return self::$projectDir;
    }
}