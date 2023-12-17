<?php
    include (__DIR__."/../functions/captcha.php");

    $captcha = "";

    if (isset($includeCaptcha)) {
        $captcha = '
            <div>
                <label>Please enter the code in the image</label>
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <input class="form-control m-0" name="captcha" placeholder="eg.. 12abc6"/>
                    <img src="'.$GLOBALS["views_folder"].'/other/captcha">
                </div>
            </div>
        ';
    }
    
    $pageHead = '
        <link rel="stylesheet" href="'.$GLOBALS["public_folder"].'/css/forms.css">
    ';
    $bodyContent = '
        <div class="w-100 row flex-grow-1 d-flex align-items-center m-0 justify-content-center">
            <div class="main-content col-lg-4 col-md-6 col-sm-12 login-register h-100 d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="fs-2 mb-4 text-center" style="color: var(--secondary); font-family: newtimes;">'.$pageTitle.'</h1>
                    <div class="pt-2 pb-2">
                        <form method="'.$formMethod.'" action="'.$formAction.'">
                            '.$formHtml.'
                            '.$captcha.'
                            <button type="submit" class="opposite-btn">'.$buttonContent.'</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="side-bar col-lg-8 col-md-6 col-sm-0 d-flex justify-content-center align-items-center">
                <div class="jumbotron fs-1">
                    <div style="background-position: center; padding: 120px; background-image: url('.$GLOBALS["public_folder"].'/images/blob.svg);">
                        <img style="zoom: 0.85;" src="'.$GLOBALS["public_folder"].'/images/jumbotron-snake.png">
                    </div>
                </div>
            </div>
        </div>
    ';
    
    include (__DIR__."/template.php");
?>
