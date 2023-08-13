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
    <style>
        body {
            display: flex;
            position: static;
            background-image: linear-gradient(pink, white);
            margin-left: auto;
            margin-right: auto;

            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        #core {
            margin-top: 9rem;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .center-image {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div id="core">
        <p>
            Kapiti based coffee van, run by a barista with a decade of experience.
        </p>
    </div>
</body>
</html>
