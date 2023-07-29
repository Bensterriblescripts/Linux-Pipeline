<?php

include('components/db.php');

$user = new stdClass;
$user->username = "admin";
$user->password = "admin";
$authuser = authenticateUser($user);
if ($authuser == 0) {
    echo 'No user found';
}
else {
    echo 'Found test user: ' . $authuser->username . ' in DB.';
}

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="title">Login</div>
    </body>
</html>