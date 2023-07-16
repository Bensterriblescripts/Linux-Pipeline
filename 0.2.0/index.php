<?php

if ($authenticated === false) {
    include('html/login.html');
}
else if ($authenticated === true) {
    include('html/home.html');
}

?>