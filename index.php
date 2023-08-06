<?php

include('components/db.php');

$ctime = time();

if (isset($_COOKIE['token'])) {
    $user = validateToken($_COOKIE['token']);
    if (isset($user['expiry']) && $user != 0 && $ctime < $user['expiry']) {
        header("Location: https://paradisecoffee.cafe/admin/home.php");
        exit();
    }
    else if ($user == 0) {
        header("Location: https://paradisecoffee.cafe/login.php");
        exit();
    }
    else {
        $token = $_COOKIE['token'];
        setcookie('token', $token, time() - 3600);
    }
}
?>
<html>
    <body>
        <h2>
            Homepage
        </h2>
    </body>
</html>
