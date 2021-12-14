<?php
include 'Controller/index_controller.php';



$ctrl = Controller();

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

    default:
        echo $ctrl->create();
}