<?php

// Get orders within the last 15 minutes
$ordertable = getOrdersCoffee();

echo '<tr>';
    echo '<td> Type </td>';
    echo '<td> Size </td>';
    echo '<td id="centerrow"> Milk </td>';
    echo '<td id="centerrow"> Extra Shots </td>';
    echo '<td id="centerrow"> Total </td>';
    echo '<td id="centerrow"> Order Time </td>';
echo '</tr>';
if (is_array($ordertable)) {
    foreach ($ordertable as $order) {
        $type = $order['itemname'];
        $size = $order['size'];
        $shots = $order['shots'];
        $milk = $order['milk'];
        $sumtotal = $order['sumtotal'];

        // Shots
        if ($order['shots'] > 0) {
            $shots = $order['shots'];
        }
        else {
            $shots = '';
        }

        // Order Time
        $ordertime = date('g:i a', $order['timeadded']);

        echo '<tr>';
            echo '<td>'.$type.'</td>';
            echo '<td>'.$size.'</td>';
            echo '<td id="centerrow">'.$milk.'</td>';
            echo '<td id="centerrow">'.$shots.'</td>';
            echo '<td id="centerrow">'.$sumtotal.'</td>';
            echo '<td id="centerrow">'.$ordertime.'</td>';
        echo '</tr>';
    }
} 
else {
    echo "Error trying to retrieve orders.";  
}
?>