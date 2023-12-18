<?php
    include_once (__DIR__."/../../functions/middleware.php");
    if ($user) {
        include_once (__DIR__."/../../functions/captcha.php");
        include_once (__DIR__."/../../functions/db.php");

        function account_edit_page($user, $error = null) {
            $pageTitle = "Your Account";
            $pageHead = '
                <link rel="stylesheet" href="'.$GLOBALS["public_folder"].'/css/account.css">
            ';
            
            $bodyContent = '
                <div class="w-100 row flex-grow-1 d-flex align-items-center m-0 justify-content-center">
                    <div class="main-window">
                        <div class="w-100 text-center d-flex justify-content-center flex-grow-1 align-items-center">
                            <h1 class="fs-4 text-center" style="color: var(--secondary); font-family: newtimes;">Edit your Account</h1>
                        </div>

                        <div class="row m-0 w-100 justify-content-center d-flex align-items-center flex-grow-1">
                            <div style="width: 500px;" class="col-auto">
                                <form method="post">
                                    <label>Enter your first name</label>
                                    <input class="form-control" name="firstname" value="'.$user["first_name"].'" placeholder="eg.. John"/>
                                    <label>Enter your last name</label>
                                    <input class="form-control" name="lastname" value="'.$user["last_name"].'" placeholder="eg.. Doe"/>
                                    <label>Enter your email address</label>
                                    <input class="form-control" name="email" value="'.$user["email"].'" placeholder="eg.. somemail@somedomain.com"/>
                                    <label>Enter your phone number</label>
                                    <input class="form-control" name="phonenumber" value="'.$user["phone_number"].'" placeholder="eg.. 123-456-7891"/>
                                    <label>Enter your billing address</label>
                                    <input class="form-control" name="billingaddress" value="'.$user["billing_address"].'" placeholder="eg.. 14 SomeStreet, Somecity"/>
                                    <label>New password?</label>
                                    <input class="form-control" name="password" type="password" placeholder="eg.. *******"/>
                                    <div>
                                        <label>Please enter the code in the image</label>
                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <input class="form-control m-0" name="captcha" placeholder="eg.. 12abc6"/>
                                            <img src="'.$GLOBALS["views_folder"].'/other/captcha">
                                        </div>
                                    </div>
                                    <p style="font-size: 10px; color: red;">'.$error.'</p>
                                    <button type="submit" class="opposite-btn">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            ';

            include_once (__DIR__."/../../components/template.php");
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            return account_edit_page($user);
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["phonenumber"]) && isset($_POST["billingaddress"]) && isset($_POST["captcha"])) {
                if (verifyCaptcha($_POST["captcha"])) {
                    try {
                        if ($_POST["password"]) {
                            $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
                        }

                        $updateArr = [
                            "first_name" => $_POST["firstname"], 
                            "last_name" => $_POST["lastname"], 
                            "email" => $_POST["email"],
                            "phone_number" => $_POST["phonenumber"], 
                            "billing_address" => $_POST["billingaddress"], 
                            "password" => $_POST["password"]
                        ];

                        $updateArr = array_filter($updateArr, function ($value) {
                            return $value !== null && $value !== '' && $value !== [];
                        });

                        if (updateUser($user["id"], $updateArr)) {
                            return header('Location: '.$GLOBALS["views_folder"]."/myaccount");
                        }
                        
                    } catch (Exception $e) {
                        echo $e;
                        return;
                    }
                    
                    return account_edit_page($user, "Something went wrong");
                }
                return account_edit_page($user, "The Captcha is incorrect");
            }
        }
    } else {
        echo header("Location: ".$GLOBALS["views_folder"]);
    }
?>