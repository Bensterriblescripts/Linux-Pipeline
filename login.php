<?php
include('components/triggers.php');
include('components/nav.php');

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    setcookie('token', $token, time() - 3600);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .login-container {
            max-width: 300px;
            margin: 100px auto;
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form label,
        .login-form input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        .login-form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="goback">
        <a href="https://paradisecoffee.cafe"><button style="padding: 5px; font-size: 14px;">Back</button></a>
    </div>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form class="login-form" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit">
        </form>
    </div>
</body>
</html>




