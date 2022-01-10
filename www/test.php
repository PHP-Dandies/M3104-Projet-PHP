<?php

include('Utils/AutoLoader.php');

try {
    $controller = new CampaignController();

    $controller->read();

} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
