<?php
    
    include_once (__DIR__."/../../functions/middleware.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        $pageTitle = "Register an account";
        $formMethod = "post";
        $formAction = "";
        $buttonContent = "Create Account";
        $includeCaptcha = true;
        $formHtml = '
            <label>Enter your first name</label>
            <input class="form-control" name="firstname" placeholder="eg.. John"/>
            <label>Enter your last name</label>
            <input class="form-control" name="lastname" placeholder="eg.. Doe"/>
            <label>Enter your email address</label>
            <input class="form-control" name="email" placeholder="eg.. somemail@somedomain.com"/>
            <label>Create a password</label>
            <input class="form-control" name="password" type="password" placeholder="eg.. *******"/>
        ';
        
        include (__DIR__."/../../components/loggedoutforms.php");
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include_once (__DIR__."/../../functions/captcha.php");
        include_once (__DIR__."/../../functions/db.php");
        if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["captcha"])) {
            if (verifyCaptcha($_POST["captcha"])) {
                $user_id = createUser($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"]);
                if ($user_id === false) {
                    header('Location: '.$GLOBALS["views_folder"].'/register');
                } else {
                    $session_id = createSession($user_id);
                    session_start();
                    $_SESSION["session_id"] = $session_id;
                    header('Location: '.$GLOBALS["views_folder"]);
                }
            }
        } else {
            header('Location: '.$GLOBALS["views_folder"].'/register');
        }
    }
?>