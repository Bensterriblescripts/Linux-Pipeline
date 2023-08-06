<?php

include('db.php');

// Token validation on POST pages
function checkToken() {
    $user = validateToken($_COOKIE['token']);
    if (!isset($user) || !$user['username']) {
        header("Location: https://paradisecoffee.cafe/login.php");
        exit();
    }
    else if ($user === 0) {
        header("Location: https://paradisecoffee.cafe/login.php");
        exit();
    }
}

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
    else if (isset($_POST['username']) && isset($_POST['password']) && !isset($_COOKIE['token'])) {
        $user = new stdClass;
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];

        $dbuser = authenticateUser($user);
        if (isset($dbuser['username']) && $dbuser != 0) {
            setcookie("token", $dbuser['token'], $dbuser['expiry']);
            header("Location: https://paradisecoffee.cafe/admin/orderhome.php");
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
        header("Location: https://paradisecoffee.cafe/");
        exit();
    }
    else {
        echo "Trigger failed";
    }
}

?>