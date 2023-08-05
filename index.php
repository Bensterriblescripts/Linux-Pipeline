<?php

include('components/db.php');

$ctime = time();

if (!isset($_COOKIE['token'])) {
    header("Location: https://paradisecoffee.cafe/login.php");
    exit();
}
else {
    $user = validateToken($_COOKIE['token']);
     if (isset($user) && $user != 0 && $ctime < $user['expiry']) {
        header("Location: https://paradisecoffee.cafe/admin/home.php");
        exit();
    }
    else if ($user == 0) {
        header("Location: https://paradisecoffee.cafe/login.php");
        exit();
    }
    else {
        echo 'DB Transaction error';
    }
}
?>
