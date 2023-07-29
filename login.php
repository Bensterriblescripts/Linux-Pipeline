<?php

include('../components/db.php');

$user = new stdClass;
$user->username = "admin";
$user->password = "admin";
authenticateUser($user);

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="title">Login</div>
    </body>
</html>