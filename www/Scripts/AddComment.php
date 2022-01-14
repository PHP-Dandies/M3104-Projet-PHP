<?php

include('../Utils/AutoLoader.php');
// add also the id of the user thought the session.............

$id = $_GET["idea_id"];
$comment = $_POST["comment"];

Database::executeUpdate("INSERT INTO COMMENT(IDEA_ID, USER_ID, COMMENT) VALUES($id, 1, '$comment')");

header('Location: ../campaigns/idea/' . $id);
exit();