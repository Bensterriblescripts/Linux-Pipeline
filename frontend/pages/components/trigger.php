<?php
include('queries.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'Received post';
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['type']) && isset($data['size']) && isset($data['extrashots']) && isset($data['milktype'])) {
        insertOrder($data);        
    }
}
else if (isset($_GET['eftpos'])) {
    $eftpos = $_GET['eftpos'];
    insertEftpos($eftpos);
}
else if (isset($_GET['cash'])) {
    $cash = $_GET['cash'];
    insertCash($cash);
}
?>