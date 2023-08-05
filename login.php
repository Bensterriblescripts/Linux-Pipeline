<?php

include('components/db.php');

// Testing
$user = new stdClass;
$user->username = 'admin';
$user->password = 'admin';
$token = authenticateUser($user);

echo 'Authenticated user with token' . $token

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="title">Login</div>
    </body>
</html>