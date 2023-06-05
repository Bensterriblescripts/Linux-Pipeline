<?php
$ordertable = getOrders();
echo '<tr>';
    echo '<td> Type </td>';
    echo '<td> Size </td>';
    echo '<td id="centerrow"> Milk </td>';
    echo '<td id="centerrow"> Extra Shots </td>';
    echo '<td id="centerrow"> Order Time </td>';
echo '</tr>';
if (is_array($ordertable)) {
    foreach ($ordertable as $order) {
        $rawtype = $order['type'];
        $rawsize = $order['size'];
        $rawmilk = $order['milk'];
        $rawshots = $order['shots'];
        $rawtimeadded = $order['timeadded'];

        // Get Coffee Type
        if ($rawtype == 0) {
            $type = 'Espresso';
        }
        else if ($rawtype == 1) {
            $type = 'Long Black';
        }
        else if ($rawtype == 2) {
            $type = 'Americano';
        }
        else if ($rawtype == 3) {
            $type = 'Flat White';
        }
        else if ($rawtype == 4) {
            $type = 'Latte';
        }
        else if ($rawtype == 5) {
            $type = 'Iced Coffee';
        }
        else if ($rawtype == 6) {
            $type = 'Cappuccino';
        }
        else if ($rawtype == 7) {
            $type = 'Mochaccino';
        }
        else if ($rawtype == 8) {
            $type = 'Hot Chocolate';
        }
        else {
            $type = 'Error';
        }

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
        if ($rawmilk == 0) {
            $milk = '';
        }
        else if ($rawmilk == 1) {
            $milk = 'Extra';
        }

        // Shots
        if ($rawshots == 0) {
            $shots = '';
        }
        else if ($rawshots > 0) {
            $shots = $rawshots;
        }

        // Order Time
        $ordertime = date('g:i a', $rawtimeadded);

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