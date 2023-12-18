<?php
    include_once (__DIR__."/../functions/middleware.php");
?>

<div class="top-bar d-flex align-items-center">
    <div class="logo-div d-flex align-items-center">
        <a class="d-flex align-items-center text-decoration-none" style="color: inherit;" href="<?php echo $GLOBALS["views_folder"] ?>">
            <i class="bi bi-lungs-fill"></i>
            <h1 class="ms-2">Snakeroo</h1>
        </a>
    </div>
    <div class="navbar">
        <a href="<?php echo $GLOBALS["views_folder"] ?>">Home</a>
        <a href="#">Services</a>
        <a href="#">FAQ</a>
        <a href="#">Contact</a>
    </div>
    <div class="ms-auto">
        <?php
            if ($user) {
                echo '
                <button class="opposite-btn">My Orders</button>
                <a href="'.$GLOBALS["views_folder"].'/logout"><button class="icon mx-1"><i class="bi bi-door-closed"></i></button></a>
                <a href="'.$GLOBALS["views_folder"].'/myaccount"><button class="icon mx-1"><i class="bi bi-person-circle"></i></button></a>
                ';
            } else {
                echo '
                <a href="'.$GLOBALS["views_folder"].'/login"><button class="mx-1 opposite-btn">Login</button></a>
                <a href="'.$GLOBALS["views_folder"].'/register"><button class="mx-1">Register</button></a>';
            }
        ?>
        
    </div>
</div>