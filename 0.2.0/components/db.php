<?php
function dbConnect() {
    $host = 'localhost';
    $database = 'postgres';
    $username = getenv('POSTGRE_USER');
    $password = getenv('POSTGRE_PASS');
    $db = pg_connect("host=$host dbname=$database user=$username password=$password");
    if (!$db) {
        echo "Failed to connect to PostgreSQL database.";
        exit;
    }
    return $db;
}

function selectOrders() {

    $db = dbConnect();
    $query = "
    SELECT * 
    FROM orders
    WHERE timeadded >= EXTRACT(EPOCH FROM NOW() - INTERVAL '1 hour')
    ORDER BY timeadded ASC";
    $result = pg_query($db, $query);
    if (!$result) {
        return 0;
    }
    $buildorder = array();
    while ($row = pg_fetch_assoc($result)) {
        $buildorder[] = array(
            'type'          => $row['type'],
            'size'          => $row['size'],
            'milk'          => $row['milk'],
            'shots'         => $row['shots'],
            'syrup'         => $row['syrup'],
            'total'         => '$'.$row['totalwhole'].".".$row['totalcents'],
            'time'          => date('h:ia', $row['timeadded'])
        );
    }
    pg_free_result($result);
    pg_close($db);
    return $buildorder;
}

function insertOrder() {

}
?>