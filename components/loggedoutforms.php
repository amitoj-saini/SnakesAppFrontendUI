<?php 
    $pageHead = '
        <link rel="stylesheet" href="'.$GLOBALS["public_folder"].'/css/forms.css">
    ';
    $bodyContent = '
        <div class="w-100 row flex-grow-1 d-flex align-items-center m-0 justify-content-center">
            <div class="main-content col-lg-4 col-md-6 col-sm-12 login-register h-100 d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="fs-2 mb-4" style="color: var(--secondary); font-family: newtimes;">'.$pageTitle.'</h1>
                    <div class="pt-2 pb-2">
                        <form method="'.$formMethod.'" action="'.$formAction.'">
                            '.$formHtml.'
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
    include $GLOBALS["project_root"]."/components/template.php";
?>
