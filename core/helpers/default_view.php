<?php
$ouput = '
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>OW Home</title>
    <meta name="description" content="OW Home">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="'. base_url("/public/dist/css/app.css") .'">
</head>

<body>
    <div id="ow_root"></div>
</body>

<script type="text/javascript" src="'. base_url("/public/dist/js/router.js") .'"></script>
</html>';

echo $ouput;