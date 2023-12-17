<?php
    session_start();
    function generateCaptchaToken($length = 6) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }

    function generateCaptcha() {
        $randomCode = generateCaptchaToken();
        $_SESSION["captcha"] = $randomCode;
        
        $image = imagecreatetruecolor(150, 50);
        $bgColor = imagecolorallocate($image, 255, 255, 255);
        $textColor = imagecolorallocate($image, 22, 163, 74);
        imagefill($image, 0, 0, $bgColor);
        imagestring($image, 5, 40, 20, $randomCode, $textColor);
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }

    function verifyCaptcha($captcha) {
        if ($_SESSION["captcha"] == $captcha) return true;
        return false;
    }
?>