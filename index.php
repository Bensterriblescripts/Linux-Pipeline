<?php

include('components/db.php');
$token = validateToken();

if ($token === 0) {
    header("Location: https://paradisecoffee.cafe/login.php");
    exit();
}
else if (isset($token) && $token != 0) {
    header("Location: https://paradisecoffee.cafe/admin/home.php");
    exit();
}
?>
