<?php

include('db.php');

// POST //
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Insert order item
    if (isset($data['type']) && isset($data['size'])) {
        insertOrder($data);
    }

    // Start new order
    else if ($data === "NewID") {
        insertUniqueOrder();
    }

    // Log in user
    else if (isset($_POST["username"]) && isset($_POST["password"]) && !isset($_COOKIE['token'])) {
        $user = new stdClass;
        $user->username = $_POST["username"];
        $user->password = $_POST["password"];

        $dbuser = authenticateUser($user);
        if (isset($dbuser['username']) && $dbuser != 0) {
            setcookie("token", $dbuser['token'], $dbuser['expiry']);
            header("Location: https://paradisecoffee.cafe/admin/home.php");
            exit();
        }
        else {
            header("Location: https://paradisecoffee.cafe/login.php");
            exit();
        }
    }

    // Log out user
    else if (isset($_POST['logout']) && $_POST['logout'] === 'true' && isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        // Delete token from DB and expire the cookie
        logoutUser($token);
        setcookie('token', $token, time() - 3600);
        header("Location: https://paradisecoffee.cafe/login.php");
        exit();
    }
    else {
        echo "Trigger failed";
    }
}

?>