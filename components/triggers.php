<?php

include('db.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['type']) && isset($data['size'])) {
        insertOrder($data);
    }
    else if ($data == "NewID") {
        insertUniqueOrder();
    }
}

?>