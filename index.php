<?php

$authenticated = true;
if ($authenticated === false) {
    header("Location: https://paradisecoffee.cafe/login.php");
    exit();
}
else if ($authenticated === true) {
    header("Location: https://paradisecoffee.cafe/admin/home.php");
    exit();
}
?>
