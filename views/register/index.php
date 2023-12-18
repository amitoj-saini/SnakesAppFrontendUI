<?php
    
    function register_page($error = null) {
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
            <label>Enter your phone number</label>
            <input class="form-control" name="phonenumber" placeholder="eg.. 123-456-7891"/>
            <label>Enter your billing address</label>
            <input class="form-control" name="billingaddress" placeholder="eg.. 14 SomeStreet, Somecity"/>
            <label>Create a password</label>
            <input class="form-control" name="password" type="password" placeholder="eg.. *******"/>
        ';
        
        include_once (__DIR__."/../../components/loggedoutforms.php");
    }

    include_once (__DIR__."/../../functions/middleware.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        register_page();
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include_once (__DIR__."/../../functions/captcha.php");
        include_once (__DIR__."/../../functions/db.php");
        if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["phonenumber"]) && isset($_POST["billingaddress"]) && isset($_POST["password"]) && isset($_POST["captcha"])) {
            if (verifyCaptcha($_POST["captcha"])) {
                try {
                    $user_id = createUser($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["phonenumber"], $_POST["billingaddress"], $_POST["password"]);
                    if ($user_id !== false) {
                        $session_id = createSession($user_id);
                        session_start();
                        $_SESSION["session_id"] = $session_id;
                        return header('Location: '.$GLOBALS["views_folder"]);
                    }
                    
                } catch (Exception $e) {}
                return register_page("The email entered already exists");
            }
        }
        return register_page("The captcha wasn't valid");
    }
?>