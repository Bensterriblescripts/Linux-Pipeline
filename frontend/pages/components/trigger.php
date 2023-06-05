<?php
include('queries.php');

if (isset($_GET['cash'])) {
    $cash = $_GET['cash'];
    insertCash($cash);
}
else if (isset($_GET['eftpos'])) {
    $eftpos = $_GET['eftpos'];
    insertEftpos($eftpos);
}
?>