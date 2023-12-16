<?php 
    $GLOBALS["project_folder"] = "snakeapp";
    $dirpath = explode("/", __DIR__);
    $GLOBALS["project_root"] = "";
    foreach ($dirpath as $path) {
        $GLOBALS["project_root"] .= $path."/";
        if ($path == $GLOBALS["project_folder"]) break;
    }

    $GLOBALS["public_folder"] = "/".$GLOBALS["project_folder"]."/public";
    $GLOBALS["views_folder"] = "/".$GLOBALS["project_folder"]."/views";
    echo '<script>const public_folder = "'.$public_folder.'"</script>';
    include_once $GLOBALS["project_root"]."/functions/db.php";
    session_start();

    $user = false;

    if (isset($_SESSION["session_id"])) {
        $session_id = $_SESSION["session_id"];
        $user = getUserFromSession($session_id);
    }

    $GLOBALS["user"] = $user;
?>