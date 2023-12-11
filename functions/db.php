<?php
//SELECT * FROM `fb_blogs` WHERE 1
$port = 3306;
$host = "localhost";
$database = "snakeapp";
$username = "root";
$password = "";

$GLOBALS["conn"] = new mysqli($host, $username, $password, $database, $port);

if ($GLOBALS["conn"]->connect_error) {
    echo "failed";
    die("Connection failed: " . $conn->connect_error);
}

function getFbPosts() {
    $queryResult = $GLOBALS["conn"] -> query("SELECT * FROM fb_blogs");
    $posts = [];
    while ($row = $queryResult->fetch_assoc()) {
        $posts[] = $row;
    }
    return $posts;
}
?>