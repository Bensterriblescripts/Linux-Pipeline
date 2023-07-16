<?php

$authenticated = true;

if ($authenticated === false) {
    include('pages/login.php');
}
else if ($authenticated === true) {
    include('pages/home.php');
}

?>