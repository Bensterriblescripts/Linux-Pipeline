<?php

include('components/db.php');
include('components/nav.php');

$ctime = time();

if (isset($_COOKIE['token'])) {
    $user = validateToken($_COOKIE['token']);
    if (isset($user['expiry']) && $user != 0 && $ctime < $user['expiry']) {
        header("Location: https://paradisecoffee.cafe/admin/home.php");
        exit();
    }
    else if ($user == 0) {
        header("Location: https://paradisecoffee.cafe/login.php");
        exit();
    }
    else {
        $token = $_COOKIE['token'];
        setcookie('token', $token, time() - 3600);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradise Coffee</title>
    <style>
        body {
            background-image: url(/assets/naturalwhite-bg.jpg);
        }
    </style>
</head>
<body>
    <div class="title">
        <h2>
            Home
        </h2>
    </div>
</body>
</html>
