<?php 
    $GLOBALS["project_folder"] = "snakeapp/";
    $GLOBALS["public_folder"] = "/".$GLOBALS["project_folder"]."public";
    $GLOBALS["views_folder"] = "/".$GLOBALS["project_folder"]."views";
    include_once (__DIR__."/db.php");
    session_start();

    $user = false;

    if (isset($_SESSION["session_id"])) {
        $session_id = $_SESSION["session_id"];
        $user = getUserFromSession($session_id);
    }

    $GLOBALS["user"] = $user;
?>