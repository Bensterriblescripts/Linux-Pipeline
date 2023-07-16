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

        // Integers remove excess 0's
        $numlength = strlen((string)$row['totalcents']);
        if ($numlength == 1) {
            $total = '$'.$row['totalwhole'].".".$row['totalcents'].'0';
        }
        else {
            $total = '$'.$row['totalwhole'].".".$row['totalcents'];
        }

        $buildorder[] = array(
            'type'          => $row['type'],
            'size'          => $row['size'],
            'decaf'         => $row['decaf'],
            'milk'          => $row['milk'],
            'shots'         => $row['shots'],
            'syrup'         => $row['syrup'],
            'total'         => $total,
            'time'          => date('g:ia', $row['timeadded'])
        );
    }
    pg_free_result($result);
    pg_close($db);
    return $buildorder;
}

function insertOrder($order) {

    $db = dbConnect();

    $type = $order['type'];
    $size = $order['size'];
    $milk = $order['milk'];
    $shots = $order['shots'];
    $syrup = $order['syrup'];
    $decaf = $order['decaf'];
    $timeadded = time();

    // Create total
    $query = "
    SELECT totalwhole, totalcents 
    FROM pricing
    WHERE item = '$type'
    AND variable = '$size'";
    $result = pg_query($db, $query);
    if (!$result) {
        return;
    }
    while ($row = pg_fetch_assoc($result)) {
        $totalwhole = $row['totalwhole'];
        $totalcents = $row['totalcents'];
    }
    pg_free_result($result);

    if ($shots > 0) {
        $totalwhole = $totalwhole + $shots;
    }
    if ($syrup != "") {
        $totalwhole = $totalwhole + 1;
    }
    if ($decaf != "") {
        $totalwhole = $totalwhole + 1;
    }

    $query = "INSERT INTO orders (type, size, milk, shots, syrup, decaf, totalwhole, totalcents, timeadded) VALUES ('$type', '$size', '$milk', '$shots', '$syrup', '$decaf', '$totalwhole', '$totalcents', '$timeadded')";
    $result = pg_query($db, $query);
    if (!$result) {
        echo "Error executing the insert query.";
        exit;
    }
    echo "Added order";
    pg_close($db);

}
?>