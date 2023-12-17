<?php 
    session_start();
    include_once (__DIR__."/../../functions/middleware.php");
    include_once (__DIR__."/../../functions/db.php");

    if ($user) {
        if (logoutAndDelete($user["session_id"])) {
            session_start();
            unset($_SESSION["session_id"]);
        }

    }
    header("Location: ".$GLOBALS["views_folder"]);
?>