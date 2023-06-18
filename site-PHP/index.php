<?php

include('pages/components/queries.php');
if (isset($_COOKIE['user_token'])) {
    $token = $_COOKIE['user_token'];
    $auth = getUserByToken($token);
    if ($auth) {
        header('Location: /pages/coffeevan.php');
        exit;
    }
    else {
        header('Location: /pages/login.php');
        exit;
    }
} 
else {
    header('Location: /pages/login.php');
    exit;
}
?>
