<?php

include('../Utils/AutoLoader.php');

class JuryController {
    public static function read() {
        JuryModel::getIdeas();
    }
}