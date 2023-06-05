<?php
// Get orders within the last 15 minutes
$ordertable = getOrdersCoffee();
echo '<tr>';
    echo '<td> Type </td>';
    echo '<td> Size </td>';
    echo '<td id="centerrow"> Milk </td>';
    echo '<td id="centerrow"> Extra Shots </td>';
    echo '<td id="centerrow"> Order Time </td>';
echo '</tr>';
if (is_array($ordertable)) {
    foreach ($ordertable as $order) {
        $type = $order['itemname'];
        $rawsize = $order['size'];

        // Get Size
        if ($rawsize == 0) {
            $size = 'Small';
        }
        else if ($rawsize == 1) {
            $size = 'Medium';
        }
        else if ($rawsize == 2) {
            $size = 'Large';
        }
        else {
            $size = 'Error';
        }
        
        // Milk
        if ($order['milk'] == 0) {
            $milk = '';
        }
        else if ($order['milk'] >= 1) {
            $milk = 'Extra';
        }

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
            echo '<td id="centerrow">'.$ordertime.'</td>';
        echo '</tr>';
    }
} 
else {
    echo "Error trying to retrieve orders.";  
}
?>