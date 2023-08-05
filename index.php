<?php

include('components/db.php');

if (!isset($_COOKIE['token'])) {
    header("Location: https://paradisecoffee.cafe/login.php");
    exit();
}
else {
    $authenticated = validateToken($_COOKIE['token']);
     if ($authenticated === 1) {
        header("Location: https://paradisecoffee.cafe/admin/home.php");
        exit();
    }
    else {
        header("Location: https://paradisecoffee.cafe/login.php");
        exit();
    }
}
?>
