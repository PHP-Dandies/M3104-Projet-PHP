<?php
include 'Controller/index_controller.php';

$ctrl = new Controller();

if (!isset($_GET["action"])) {
    echo $ctrl->create();
} else {
    switch ($_GET["action"]) {
        case "create":
            echo $ctrl->create();
            break;

        case "read":
            echo $ctrl->read();
            break;

        case "update":
            echo $ctrl->update();
            break;

        case "delete":
            echo $ctrl->delete();
            break;
    }
}