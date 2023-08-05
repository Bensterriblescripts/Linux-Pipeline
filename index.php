<?php

include('components/db.php');

if (!isset($_COOKIE['token'])) {
    header("Location: https://paradisecoffee.cafe/login.php");
    exit();
}
else {
    $user = validateToken($_COOKIE['token']);
     if ($user != 0) {
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
