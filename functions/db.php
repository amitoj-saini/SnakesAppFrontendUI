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

function generateSession($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

function getFbPosts() {
    $queryResult = $GLOBALS["conn"] -> query("SELECT * FROM fb_blogs");
    $posts = [];
    while ($row = $queryResult->fetch_assoc()) {
        $posts[] = $row;
    }
    return $posts;
}

function getUserFromSession($session_id) {
    $sessions = $GLOBALS["conn"]->execute_query("SELECT id, user_id FROM sessions WHERE session = ?", [$session_id]);
    $user_id = null;
    $session_id = null;
    while ($row = $sessions->fetch_assoc()) {
        $user_id = $row["user_id"];
        $session_id = $row["id"];
        break;
    }

    if ($user_id !== null) {
        $users = $GLOBALS["conn"]->execute_query("SELECT * FROM users WHERE id = ?", [$user_id]);
        $user = $users->fetch_assoc();
        if ($user) {
            $user[] = $user;
            $user["session_id"] = $session_id;
            return $user;
        }
    }
    return false;
}

function createUser($firstName, $lastName, $email, $phoneNumber, $billingAddress, $password) {
    $queryResult = $GLOBALS["conn"] -> execute_query("INSERT INTO users (first_name, last_name, email, phone_number, billing_address, password) VALUES (?, ?, ?, ?, ?, ?);", [$firstName, $lastName, $email, $phoneNumber, $billingAddress, password_hash($password, PASSWORD_DEFAULT)]);
    if ($queryResult) {
        return $GLOBALS["conn"]->insert_id;
    }
    return false;
}

function createSession($user_id) {
    $session = generateSession();
    $queryResult = $GLOBALS["conn"] -> execute_query("INSERT INTO sessions (session, user_id) VALUES (?, ?);", [$session, $user_id]);
    return $session;
}

function logoutAndDelete($session_id) {
    # this is the key session id not the sessionId itself
    $queryResult = $GLOBALS["conn"] -> execute_query("DELETE FROM sessions WHERE id = ?;", [$session_id]);
    if ($queryResult) return true;
    return false;
}

function verifyUser($email, $password) {
    $users = $GLOBALS["conn"]->execute_query("SELECT * FROM users WHERE email = ?", [$email]);
    while ($user = $users->fetch_assoc()) {
        if (password_verify($password, $user["password"])) {
            return $user;
        }
    }
    return false;
}

function updateUser($user_id, $arr) {
    $setClause = implode(', ', array_map(function ($key) {
        return "$key = ?";
    }, array_keys($arr)));
    
    $parameters = array_values($arr);
    $parameters[] = $user_id;
    $query = "UPDATE users SET $setClause WHERE id = ?";
    $result = $GLOBALS["conn"]->execute_query($query, $parameters);
    if ($result) {
        return true;
    }
    return false;
}
?>