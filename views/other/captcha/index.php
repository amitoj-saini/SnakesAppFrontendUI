<?php
    
    session_start();
    include_once (__DIR__."/../../../functions/middleware.php");
    include_once (__DIR__."/../../../functions/captcha.php"); 

    generateCaptcha();
  
?>

