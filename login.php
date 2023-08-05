<?php

include('components/db.php');

// Testing
$user = new stdClass;
$user->username = 'admin';
$user->password = 'admin';
$dbuser = authenticateUser($user);

setcookie("token", $dbuser['token'], $dbuser['expiry']);
header("Location: https://paradisecoffee.cafe/admin/home.php");
exit();

?>