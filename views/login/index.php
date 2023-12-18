<?php
    function login_page($error="") {
        $pageTitle = "Login to your Account";
        $formMethod = "post";
        $formAction = "";
        $buttonContent = "Login";
        $includeCaptcha = true;
        $formHtml = '
            <label>Enter your email address</label>
            <input class="form-control" name="email" placeholder="eg.. somemail@somedomain.com"/>
            <label>Enter the password to your account</label>
            <input class="form-control" name="password" type="password" placeholder="eg.. *******"/>
        ';
        
        include_once (__DIR__."/../../components/loggedoutforms.php");
    }

    include_once (__DIR__."/../../functions/middleware.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        login_page();
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include_once (__DIR__."/../../functions/captcha.php");
        include_once (__DIR__."/../../functions/db.php");
        if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["captcha"])) {
            if (verifyCaptcha($_POST["captcha"])) {
                $user = verifyUser($_POST["email"],  $_POST["password"]);
                if ($user) {
                    $session_id = createSession($user["id"]);
                    session_start();
                    $_SESSION["session_id"] = $session_id;
                    return header('Location: '.$GLOBALS["views_folder"]);
                }
                return login_page("The Email or Password was incorrect");
                
            }
        }
        return login_page("The captcha was incorrect!");
    }
?>