<?php

include('components/db.php');

// Testing
$user = new stdClass;
$user->username = 'admin';
$user->password = 'admin';
$dbuser = authenticateUser($user);

setcookie("token", $dbuser['token'], $dbuser['expiry']);
echo 'Created token & cookie' . $dbuser['token'];

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="title">Login</div>
    </body>
</html>