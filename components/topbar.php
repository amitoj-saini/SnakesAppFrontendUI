<?php
    include_once (__DIR__."/../functions/middleware.php");
?>

<div class="top-bar d-flex align-items-center">
    <div class="logo-div d-flex align-items-center">
        <i class="bi bi-lungs-fill"></i>
        <h1 class="ms-2">Snakeroo</h1>
    </div>
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Services</a>
        <a href="#">FAQ</a>
        <a href="#">Contact</a>
    </div>
    <div class="ms-auto">
        <?php
            if ($user) {
                echo '
                <a href="'.$GLOBALS["views_folder"].'/logout"><button class="mx-1 opposite-btn">Logout</button></a>
                <button>My Orders</button>';
            } else {
                echo '
                <a href="'.$GLOBALS["views_folder"].'/login"><button class="mx-1 opposite-btn">Login</button></a>
                <a href="'.$GLOBALS["views_folder"].'/register"><button class="mx-1">Register</button></a>';
            }
        ?>
        
    </div>
</div>