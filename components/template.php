<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="/snakeapp/public/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/snakeapp/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/snakeapp/public/css/style.css">
    <link rel="icon" href="/snakeapp/public/images/favicon.ico">
    <?php echo $pageHead; ?>
</head>
<body>
    <main class="main">
        <?php
            include "topbar.php";
            echo $bodyContent; 
        ?>
    </main>
</body>
</html>