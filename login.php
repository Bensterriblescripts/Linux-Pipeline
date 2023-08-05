<?php

include('components/db.php');

// Testing
$user = new stdClass;
$user->username = 'admin';
$user->password = 'admin';
$dbuser = authenticateUser($user);

setcookie("token", $dbuser['token'], $dbuser['expiry']);
echo 'Created token & cookie ' . $dbuser['token'] . "\n\n" . 'Cookie value: ' . $_COOKIE['token'];

header("Location: https://paradisecoffee.cafe/login.php");
exit();



?>