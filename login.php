<?php

include('components/db.php');

// Testing
$user = new stdClass;
$user->username = 'admin';
$user->password = 'admin';
$dbuser = authenticateUser($user);

setcookie("token", $dbuser['token'], $dbuser['expiry']);
echo 'cookie contents: ' . $_COOKIE['token']['contents'];

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="title">Login</div>
    </body>
</html>