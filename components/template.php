<?php 
include_once "../../functions/middleware.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="<?php echo $GLOBALS["public_folder"] ?>/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS["public_folder"] ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $GLOBALS["public_folder"] ?>/css/style.css">
    <link rel="icon" href="<?php echo $GLOBALS["public_folder"] ?>/images/favicon.ico">
    <?php echo $pageHead; ?>
</head>
<body>
    <main class="main">
        <?php
            include $GLOBALS["project_root"]."components/topbar.php";
            echo $bodyContent; 
        ?>
    </main>
</body>
</html>