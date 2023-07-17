<?php
include('../components/db.php');

// Get the current orders
$orders = selectOrders();

// Create a new uniqueID
insertUniqueOrder();

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="centercontainer">
            <button id="orderbutton" onclick="orderButton()">New Order</button>
        </div>
        <?php
        if (isset($orders[0])) {
            foreach ($orders as $order) {

                if (!isset($orderid)) {

                    $totalwhole = 0;
                    $totalcents = 0;

                    echo '
                    <table id="uniqueorder">
                    <tbody>
                    <tr style="border: 2px solid black;">
                        <td style="text-align: left;">'.$order['type'].'</td>
                        <td>'.$order['size'].'</td>';

                    if (isset($order['decaf'])) {
                        echo '<td>'.$order['decaf'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['milk'])) {
                        echo '<td>'.$order['milk'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['shots']) && $order['shots'] != 0) {
                        echo '<td>'.$order['shots'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['syrup'])) {
                        echo '<td>'.$order['syrup'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }

                    $numlength = strlen((string)$order['totalcents']);
                    if ($numlength == 1) {
                        $cutotal = '$'.$order['totalwhole'].".".$order['totalcents'].'0';
                    }
                    else {
                        $cutotal = '$'.$order['totalwhole'].".".$order['totalcents'];
                    };

                    echo '<td>'.$cutotal.'</td>';
                    echo '<td>'.$order['time'].'</td>';
                    echo '</tr>';

                    $orderid = $order['orderid'];
                    $totalwhole = $totalwhole + $order['totalwhole'];
                    $totalcents = $totalcents + $order['totalcents'];

                }
                else if ($orderid == $order['orderid']) {
                    echo '
                    <tr>
                        <td style="text-align: left;">'.$order['type'].'</td>
                        <td>'.$order['size'].'</td>';

                    if (isset($order['decaf'])) {
                        echo '<td>'.$order['decaf'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['milk'])) {
                        echo '<td>'.$order['milk'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['shots']) && $order['shots'] != 0) {
                        echo '<td>'.$order['shots'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['syrup'])) {
                        echo '<td>'.$order['syrup'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }

                    $numlength = strlen((string)$order['totalcents']);
                    if ($numlength == 1) {
                        $cutotal = '$'.$order['totalwhole'].".".$order['totalcents'].'0';
                    }
                    else {
                        $cutotal = '$'.$order['totalwhole'].".".$order['totalcents'];
                    };

                    echo '<td>'.$cutotal.'</td>';
                    echo '<td>'.$order['time'].'</td>';
                    echo '</tr>';

                    $orderid = $order['orderid'];
                    $totalwhole = $totalwhole + $order['totalwhole'];
                    $totalcents = $totalcents + $order['totalcents'];
                }
                else if ($orderid != $order['orderid']) {

                    $totallength = strlen((string)$totalcents);
                    if ($totallength == 3) {
                        $carry = substr($totalcents, 0, 1);
                        $totalwhole = $totalwhole + $carry;
                        $totalcents = $totalcents - ($carry * 100);
                        $numlength = strlen((string)$totalcents);
                        if ($numlength == 1) {
                            $total = '$'.$totalwhole.".".$totalcents.'0';
                        }
                        else {
                            $total = '$'.$totalwhole.".".$totalcents;
                        };
                    }
                    else if ($totallength == 4) {
                        $carry = substr($totalcents, 0, 2);
                        $totalwhole = $totalwhole + $carry;
                        $totalcents = $totalcents - ($carry * 100);
                        $numlength = strlen((string)$totalcents);
                        if ($numlength == 1) {
                            $total = '$'.$totalwhole.".".$totalcents.'0';
                        }
                        else {
                            $total = '$'.$totalwhole.".".$totalcents;
                        };
                    }
                    else {
                        $total = '$'.$order['totalwhole'].".".$order['totalcents'];
                    };


                    echo '
                    <tr><td>
                    <b>Total: '.$total.'</b>
                    </tr></td>
                    </tbody>
                    </table>
                    <table id="uniqueorder"><tbody>
                    <tr style="border: 2px solid black;">
                        <td style="text-align: left;">'.$order['type'].'</td>
                        <td>'.$order['size'].'</td>';

                    $totalwhole = 0;
                    $totalcents = 0;

                    if (isset($order['decaf'])) {
                        echo '<td>'.$order['decaf'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['milk'])) {
                        echo '<td>'.$order['milk'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['shots']) && $order['shots'] != 0) {
                        echo '<td>'.$order['shots'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    if (isset($order['syrup'])) {
                        echo '<td>'.$order['syrup'].'</td>';
                    }
                    else {
                        echo '<td></td>';
                    }
                    $numlength = strlen((string)$order['totalcents']);
                    if ($numlength == 1) {
                        $cutotal = '$'.$order['totalwhole'].".".$order['totalcents'].'0';
                    }
                    else {
                        $cutotal = '$'.$order['totalwhole'].".".$order['totalcents'];
                    };

                    echo '<td>'.$cutotal.'</td>';
                    echo '<td>'.$order['time'].'</td>';
                    echo '</tr>';

                    $orderid = $order['orderid'];
                    $totalwhole = $totalwhole + $order['totalwhole'];
                    $totalcents = $totalcents + $order['totalcents'];
                }

            }
            $totallength = strlen((string)$totalcents);
            if ($totallength == 3) {
                $carry = substr($totalcents, 0, 1);
                $totalwhole = $totalwhole + $carry;
                $totalcents = $totalcents - ($carry * 100);
                $numlength = strlen((string)$totalcents);
                if ($numlength == 1) {
                    $total = '$'.$totalwhole.".".$totalcents.'0';
                }
                else {
                    $total = '$'.$totalwhole.".".$totalcents;
                };
            }
            else if ($totallength == 4) {
                $carry = substr($totalcents, 0, 2);
                $totalwhole = $totalwhole + $carry;
                $totalcents = $totalcents - ($carry * 100);
                $numlength = strlen((string)$totalcents);
                if ($numlength == 1) {
                    $total = '$'.$totalwhole.".".$totalcents.'0';
                }
                else {
                    $total = '$'.$totalwhole.".".$totalcents;
                };
            }
            else {
                $total = '$'.$order['totalwhole'].".".$order['totalcents'];
            };


            echo '
            <tr><td>
            <b>Total: '.$total.'</b>
            </tr></td>';
            echo '
                </tbody>
            </table>';
        }

        else {
            echo '<div id="noorders">No Orders</div>';
        }
        ?>
    </body>
</html>
<script>
function orderButton() {
    window.location="https://paradisecoffee.cafe/admin/order.php";
}
</script>