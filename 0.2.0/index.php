<?php

// Validate token, always on landing

if ($authenticated == true) {
    include('index.html');
}
else if ($authenticated == false){
    include('pages/locked.php');
}
else {
    include('pages/login.php');
}

?>