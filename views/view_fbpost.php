<?php
    header('Cache-Control "public, max-age=12400";');
?>

<head>
    <link rel="stylesheet" href="/snakeapp/public/css/facebook.css">
    <script src="/snakeapp/public/js/facebook.js">
</head>
<?php
    if (isset($_GET["href"]) && isset($_GET["width"]))
    $url = 'https://www.facebook.com/plugins/post.php?href='.urlencode($_GET["href"]).'&show_text=true&width='.$_GET["width"];

    $options = [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => 'GET',
        CURLOPT_HTTPHEADER     => [
            'authority: www.facebook.com',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
            'accept-language: en-US,en;q=0.6',
            'cookie: datr=x7FyZduqiKWz35GNbicGdNmq',
            'referer: http://amitojs.local/',
            'sec-ch-ua: "Not_A Brand";v="8", "Chromium";v="120", "Brave";v="120"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "macOS"',
            'sec-fetch-dest: iframe',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: cross-site',
            'sec-fetch-user: ?1',
            'sec-gpc: 1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
        ],
    ];

    $ch = curl_init();
    curl_setopt_array($ch, $options);

    $response = curl_exec($ch);

    curl_close($ch);

    echo $response;
?>