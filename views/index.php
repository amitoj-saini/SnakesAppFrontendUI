<?php 
    include_once "../functions/db.php";
    $posts = getFbPosts();
    $pageTitle = "SnakeApp";
    $pageHead = '
        <link rel="stylesheet" href="/snakeapp/public/css/index.css">
    ';
    $bodyContent = '
        <div class="w-100 flex-grow-1 d-flex flex-column">
            <div class="d-flex justify-content-center">
                <div class="jumbotron fs-1">
                    <img src="/snakeapp/public/images/jumbotron-snake.png">
                    <span class="text">The worlds best Snake Product Thingy!</span>
                </div>
            </div>
            
            <div class="w-100 mt-4 flex-grow-1 d-flex" >
                <svg class="w-100 info position-absolute" style="background: transparent; color: var(--dark-secondary);" fill="currentColor" id="visual" viewBox="0 310 900 290" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%">
                    <path d="M0 317L16.7 314.7C33.3 312.3 66.7 307.7 100 315.7C133.3 323.7 166.7 344.3 200 355.8C233.3 367.3 266.7 369.7 300 361.2C333.3 352.7 366.7 333.3 400 331.2C433.3 329 466.7 344 500 355C533.3 366 566.7 373 600 377.3C633.3 381.7 666.7 383.3 700 370.3C733.3 357.3 766.7 329.7 800 329C833.3 328.3 866.7 354.7 883.3 367.8L900 381L900 601L883.3 601C866.7 601 833.3 601 800 601C766.7 601 733.3 601 700 601C666.7 601 633.3 601 600 601C566.7 601 533.3 601 500 601C466.7 601 433.3 601 400 601C366.7 601 333.3 601 300 601C266.7 601 233.3 601 200 601C166.7 601 133.3 601 100 601C66.7 601 33.3 601 16.7 601L0 601Z" fill="currentColor" stroke-linecap="round" stroke-linejoin="miter"></path>
                </svg>

                <div class="wave-overlap">
                    <h1 class="fs-2" style="font-family: newtimes;">What do we do?</h1>
                    <div class="mt-2 text-center fs-6 about-expand" style="font-size: 13px; font-weight: 200;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae sapien in ipsum interdum efficitur. Snake services offer unparalleled expertise in reptilian care, ensuring optimal health and habitat. Trust us for comprehensive solutions, from habitat design to dietary guidance.
                    </div>
                    <h1 class="fs-3" style="margin-top: 100px; font-family: newtimes;">News</h1>
                    <div class="mt-2 mb-5  container d-flex justify-content-center row w-100">
                        '.implode('', array_map(fn($post) => "
                        <div class=\"col-auto facebook-posts mt-4\">
                            <iframe loading=\"lazy\" height=\"".$post["height"]."\" width=\"500\" src=\"http://amitojs.local/snakeapp/views/view_fbpost.php?href=".urlencode($post["post"])."&show_text=true&width=500\"></iframe>
                        </div>
                        ", $posts)).' 
                    </div>
                </div>
            </div>
        </div>
    ';
    include "../components/template.php";
?>
