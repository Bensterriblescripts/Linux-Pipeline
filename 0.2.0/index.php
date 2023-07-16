<?php

<<<<<<< HEAD
if ($authenticated === false) {
    include('html/login.html');
}
else if ($authenticated === true) {
    include('html/home.html');
=======
// Validate token, always on landing

if ($authenticated == true) {
    include('index.html');
}
else if ($authenticated == false){
    include('pages/locked.php');
}
else {
    include('pages/login.php');
>>>>>>> 8bc65e812597431784163e7e5ec261ab37b22df2
}

?>