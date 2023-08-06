<?php
include('../components/triggers.php');
checkToken();

// Get the current orders
$orders = selectOrders();
insertUniqueOrder();

?>
<html>
    <style>
        <?php include '../index.css'; ?>
    </style>
    <body>
        <div class="logout-btn">
            <form id="logoutForm" method="post">
                <input type="hidden" name="logout" value="true">
                <button type="submit" style="padding: 5px; font-size: 14px;">Logout</button>
            </form>
        </div>
        <div class="goback">
            <a href="https://paradisecoffee.cafe"><button style="padding: 5px; font-size: 14px;">Back</button></a>
        </div>
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

                    $totalwhole = $totalwhole + $order['totalwhole'];
                    $totalcents = $totalcents + $order['totalcents'];

                    echo '<td>'.$order['time'].'</td>';
                    echo '</tr>';

                    $orderid = $order['orderid'];
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

                    echo '<td>'.$order['time'].'</td>';
                    echo '</tr>';

                    $orderid = $order['orderid'];
                    $totalwhole = $totalwhole + $order['totalwhole'];
                    $totalcents = $totalcents + $order['totalcents'];
                }
                else if ($orderid != $order['orderid']) {
                    
                    $centslength = strlen(strval($totalcents));
                    if ($centslength > 3) {
                        $remcents = $totalcents / 100;
                        $totalwhole = $totalwhole + $remcents;
                        $totalcents = $totalcents - ($remcents * 100);
                    }
                    $total = "$" . $totalwhole . '.' . $totalcents;

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

                    echo '<td>'.$order['time'].'</td>';
                    echo '</tr>';

                    $orderid = $order['orderid'];
                    $totalwhole = $totalwhole + $order['totalwhole'];
                    $totalcents = $totalcents + $order['totalcents'];
                }

            }

            $centslength = strlen(strval($totalcents));
            if ($centslength > 3) {
                $remcents = $totalcents / 100;
                $totalwhole = $totalwhole + $remcents;
                $totalcents = $totalcents - ($remcents * 100);
            }
            $total = "$" . $totalwhole . '.' . $totalcents;

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
    window.location="https://paradisecoffee.cafe/admin/orderhome.php";
}
</script>